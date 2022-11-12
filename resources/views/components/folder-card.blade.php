@props(['folder'])
<article>
    <h1>HWELLO THERE</h1>
    <img src="{{ asset('image/285658_blue_folder_icon.png') }}" alt="folder_image" title="folder_image" width="50px" height="50px">
    <p>{{ $folder['name'] }}</p>
    <p>{{ $folder['type'] }}</p>
    @foreach ($folder['data'] as $key => $value)
        {{-- folder parameters --}}
        @if ($key == "count_dir_files")
            <p><b>Files: </b>{{ $value }}</p>
        @endif
        @if ($key == "get_directory_size")
            <p><b>Size: </b>{{ $value }}</p>
        @endif
        {{-- file parameters --}}
        @if ($folder['type'] == "file")
            @if ($key == "file_size")
                <p><b>Size: </b>{{ $value }}</p>
            @endif
            @if ($key == "last_modified")
                <p><b>Last Modified: </b>{{ $value }}</p>
            @endif
        @endif
    @endforeach
</article>