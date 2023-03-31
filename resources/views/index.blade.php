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
        <div class="parameters_form">
            <form method="POST" action="/filebrowser" enctype="multipart/form-data">
                @csrf

                <div>
                    <label for="folder">Choose a folder path:</label>
                    <input id="folder" name="folder" type="text" placeholder="/Downloads" pattern="^\/.{1,128}"
                        title="Directory Path should start with /" required>
                </div>

                <div>
                    <label for="cut_date">Date Start:</label>
                    <input id="cut_date" name="cut_date" type="date">
                </div>

                <div>
                    <label for="cut_date_end">Date End:</label>
                    <input id="cut_date_end" name="cut_date_end" type="date">
                </div>

                <div>
                    <label for="depth_search">Search Recursively?
                        <input type="checkbox" name="depth_search">
                    </label>
                </div>

                <div>
                    <button type="submit">Scan</button>
                </div>

            </form>
        </div>
    </main>
    @include('_filebrowser-footer')
</body>

</html>
