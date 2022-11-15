@props(['folder'])
<div class="folder-directory" style="display: flex" onclick="toggle(this)">
    <div>
        <img src="{{ asset('image/285658_blue_folder_icon.png') }}" alt="folder_image" title="folder_image" width="100px" height="100px">
    </div>
    <div style="align-items: center; margin-left: 20px;">
        <p>{{ $folder['name'] }}</p>
        @foreach ($folder['data'] as $key => $value)
            @if ($key == "count_dir_files")
                <p><b>Files: </b>{{ $value }}</p>
            @endif
            @if ($key == "get_directory_size")
                <p><b>Size: </b>{{ $value }}</p>
            @endif
        @endforeach
    </div>
</div>