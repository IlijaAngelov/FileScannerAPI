<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src={{ URL::asset('js/custom.js') }}></script>
    <link rel="stylesheet" href="{{ URL::asset('css/custom.css') }}">
    <title>File Scanner</title>
</head>
<body style="width: 80%; margin-left: auto; margin-right: auto; text-align:center; background-color: #dadada;">
    @include('_filebrowser-header')
    <main class="container" style="background-color: white; padding: 20px 0;">
        <div>
            <p>Load Saved: <input type="checkbox"></p>
            <p>auto load froms saved settings</p>
        </div>
        <div>
            <label for="older_than">
                <p>Older Than:</p>
                <input type="date" id="older_than" name="older_than">
            </label>
        </div>
        <div>
            <label for="younger_than">
                <p>Younger Than:</p>
                <input type="date" id="younger_than" name="younger_than">
            </label>
        </div>
        <div>
            <input type="text" placeholder="Search Files">
        </div>
    </main>
    {{-- <hr style="margin-bottom: 10px;"> --}}
    {{ $filebrowser }}


</body>
</html>