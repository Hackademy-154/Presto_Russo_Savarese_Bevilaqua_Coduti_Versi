<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Site Presto</title>
  </head>
  <body>



    <x-navbar/>
    {{$slot}}



  </body>
</html>