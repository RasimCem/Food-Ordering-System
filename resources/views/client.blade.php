<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <title>Food Orderin System</title>
    </head>
    <body class="font-mono bg-gray-200 " >
        <div id="app">
            <layout-component></layout-component>
        </div>
        <script src={{mix('js/app.js')}}></script>
    </body>
</html>
