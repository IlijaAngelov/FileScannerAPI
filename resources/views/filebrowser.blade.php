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
<body>
    @include('_filebrowser-header')
    <main class="container">
        <div class="load_settings">
            <p>Load Saved: <input type="checkbox"></p>
            <p><small>auto load froms saved settings</small></p>
        </div>
        <div class="time_settings">
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
        </div>
        <div class="search_bar">
            <input type="text" placeholder="Search Files">
        </div>

    @php
        $array = json_decode(json_encode($response->getData()), true);
    @endphp
    @each('partials.project', $array, 'project')

    </main>
</body>
</html>
