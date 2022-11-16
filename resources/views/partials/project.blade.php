<div class="block">
    @if ($project['type'] == 'file')
        <div class="file-directory" style="display: flex">
            <img src="{{ asset('image/file.jpg') }}" alt="file_image" title="file_image" width="100px" height="100px">
        </div>
        @else
        <div class="folder-directory" style="display: flex" onclick="toggle(this)">
            <img src="{{ asset('image/285658_blue_folder_icon.png') }}" alt="folder_image" title="folder_image" width="100px" height="100px">
        </div>
    @endif
    {{ $project['name'] }}
    @foreach ($project['data'] as $key => $value)
        @if ($key == "file_size")
            <p><b>Size: </b>{{ $value }}</p>
        @endif
        @if ($key == "last_modified")
            <p><b>Last Modified: </b>{{ $value }}</p>
        @endif
        @if ($key == "count_dir_files")
                <p><b>Files: </b>{{ $value }}</p>
        @endif
        @if ($key == "get_directory_size")
            <p><b>Size: </b>{{ $value }}</p>
        @endif
    @endforeach
</div>

@if ($project['subs'] != null)
    <div class="hide sub">
    @foreach($project['subs'] as $project)
        @include('partials.project', $project)
    @endforeach
    </div>
@endif