<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $subject ?? 'Message from website' }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f6f9fc;
            color: #333;
            padding: 30px;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }
        h1 {
            font-size: 20px;
            margin-bottom: 20px;
            color: #4A6CF7;
        }

        h2 {
            font-size: 18px;
            margin-bottom: 20px;
            color: #4A6CF7;
        }
        .data {
            margin-bottom: 10px;
        }
        .data strong {
            display: inline-block;
            width: 120px;
        }
        .footer {
            margin-top: 40px;
            font-size: 12px;
            color: #999;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Pluginyonline.cz – potvrzení doručení zprávy</h1>

    <p>Dobrý den,</p>

    <p>potvrzujeme doručení Vaší zprávy. Odpovíme Vám co nejdříve, jakmile to bude možné.</p>

    <p>Děkujeme,</p>

    <p>Tým Pluginyonline.cz</p>

    <h2>Detaily odeslané zprávy:</h2>

    <div class="data"><strong>Jméno:</strong> {{ $data['name'] ?? '-' }}</div>
    <div class="data"><strong>Email:</strong> {{ $data['email'] ?? '-' }}</div>
    <div class="data"><strong>Telefon:</strong> {{ $data['phone'] ?? '-' }}</div>
    <div class="data"><strong>Společnost:</strong> {{ $data['company'] ?? '-' }}</div>
    <div class="data"><strong>Zpráva:</strong><br> {!! nl2br(e($data['message'] ?? '-')) !!}</div>

    <div class="footer">
        Tento e-mail byl vygenerován automaticky. Neodpovídejte na něj.
    </div>
</div>
</body>
</html>
