<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send Email</title>
</head>
<body>
    <table>
        <tr>
            <td>Hi {{$nome}}</td>
        </tr>
        <tr>
            <td>--------------</td>
        </tr>
        <tr>
            <td>E-mail: {{$email}}</td>
        </tr>
        <tr>
            <td>Horário: {{$datahora}}</td>
        </tr>
    </table>
    <div>
        <img width='10%' height='10%' src="{{ $message->embed( public_path() . '/image/logo-laravel.png' ) }}" alt="">
    </div>
</body>
</html>