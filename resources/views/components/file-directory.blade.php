@props(['folder'])
<div class="file-directory" style="display: flex">
    <div>
        <img src="{{ asset('image/file.jpg') }}" alt="file_image" title="file_image" width="100px" height="100px">
    </div>
    <div>
        <p>{{ $folder['name'] }}</p>
        @foreach ($folder['data'] as $key => $value)
            @if ($key == "file_size")
                <p><b>Size: </b>{{ $value }}</p>
            @endif
            @if ($key == "last_modified")
                <p><b>Last Modified: </b>{{ $value }}</p>
            @endif
        @endforeach
    </div>
</div>