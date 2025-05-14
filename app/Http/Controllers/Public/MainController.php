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
use App\Services\SimpleMailer;
use App\Services\TelgramNotifier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
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

    public function processMessage(ContactFormRequest $request, TelgramNotifier $telegramNotifier, SimpleMailer $mailer)
    {
        $validated = $request->validated();

        $savedMessage = Message::create($validated['data']);

        $email = $validated['data']['email'];
        $message = $validated['data']['message'];

        $adminEmails = User::where('is_admin', 1)->pluck('email');


        $url = 'www.pronajemonline.cz';// retrieve Admin show message url instead
        $text = Str::limit($message, 70);
        $telegramMessage = <<<TEXT
                <b>Nová zpráva z webu.</b>
                <b>Od:</b> {$validated['data']['name']}
                <b>Zpráva:</b> {$text}
                TEXT;

        $telegramNotifier->send($telegramMessage, $url);

        //send mail to customer
        $mailer->send($email, new MessageSent($validated));

        //send mail to admins
        foreach ($adminEmails as $email) {
              $mailer->send($email, new AdminMessageSent($validated));
        }

        return response()->json('Message sent!', 200);

    }


}
