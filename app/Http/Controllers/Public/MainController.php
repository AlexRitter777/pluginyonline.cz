<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactFormRequest;
use App\Mail\AdminMessageSent;
use App\Mail\MessageSent;
use App\Models\Message;
use App\Models\Portfolio;
use App\Models\Service;
use App\Models\User;
use App\Services\RecaptchaService;
use App\Services\TelgramNotifier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class MainController extends Controller
{
    public function index(){

      $services = Cache::rememberForever('services', function () {
          return Service::where('is_published', 1)
              ->orderByRaw('position IS NULL')
              ->orderBy('position')
              ->limit(3)
              ->get();
      });

      $portfolios = Cache::rememberForever('portfolios', function () {
          return Portfolio::where('is_published', 1)
              ->orderByRaw('position IS NULL')
              ->orderBy('position')
              ->limit(4)
              ->get();
      });

        return view('public.home', ['services' => $services, 'portfolios' => $portfolios]);
    }


    public function verify(Request $request) {

        $request->validate([
            'token' => 'required',
        ]);

        $token = $request->token;

        $response = RecaptchaService::validate($token);

        return response()->json($response);

    }

    public function processMessage(ContactFormRequest $request, TelgramNotifier $telgramNotifier)
    {

        $validated = $request->validated();

        $savedMessage = Message::create($validated['data']);

        $url = 'www.pronajemonline.cz';// retrieve Admin show message url instead

        $text = Str::limit($validated['data']['message'], 70);

        $message = <<<TEXT
                <b>Nová zpráva z webu.</b>
                <b>Od:</b> {$validated['data']['name']}
                <b>Zpráva:</b> {$text}
                TEXT;

        $telgramNotifier->send($message, $url);

        $email = $validated['data']['email'];

        //send mail to customer
        try {
            Mail::to($email)->send(new MessageSent($validated));
        }catch (\Throwable $e){
            Log::error('Client mail send failed: ' . $e->getMessage());
        }

        //send mail to admins
        $emails = User::where('is_admin', 1)->pluck('email');

        foreach ($emails as $email) {
            try {
                Mail::to($email)->send(new AdminMessageSent($validated));
            }catch (\Throwable $e){
                Log::error('Admin mail send failed: ' . $e->getMessage());
            }

        }

        return response()->json('Message sent!', 200);

    }


}
