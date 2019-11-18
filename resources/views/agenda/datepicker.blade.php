<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    

    <link rel="stylesheet" href="{{ asset('css/fullCalendar/datepicker.min.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/fullCalendar/datepicker.min.js')}}"></script>
    <script src="{{ asset('js/fullCalendar/datepicker.pt-BR.js')}}"></script>
</head>
<body>
    <form action="" method="get">
        <input type="text" name="datepicker" id="datepicker" class="datepicker-here">
    </form>
</body>
<script>
    $('#datepicker').datepicker({
        language: 'pt-BR',
        minDate: new Date() // Now can select only dates, which goes after today
    })
</script>
</html>