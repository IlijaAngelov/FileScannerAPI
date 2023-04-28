<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Scanned Directory</title>
</head>
<body>
    {{-- Improve the Display/UI --}}
    @foreach ($folders as $folder)
        <p>Pathz: {{ $folder->filename }} </p>
        <p>Name: {{ $folder->type }} </p>
        <p>File: {{ $folder->file }} </p>
        <p>File Ext: {{ $folder->file_ext }} </p>
        <p>Full Url: {{ $folder->full_url }} </p>
        <p>Is Image: {{ $folder->is_image }} </p>
        <p>Basename File: {{ $folder->basename_file }} </p>
        <p>File size: {{ $folder->filesize }} </p>
        <p>Last modified T: {{ $folder->last_modified_t }} </p>
        <p>Last modfied (human readable): {{ $folder->last_modified }} </p>
        <p>Modified after: {{ $folder->cut_date }} </p>
        <p>Modified before: {{ $folder->cut_date_end }} </p>
        <p>No idea: {{ $folder->return_direction }} </p>
    @endforeach
</body>
</html>
