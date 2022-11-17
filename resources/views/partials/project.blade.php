<div class="block">
    @if ($project['type'] == 'file')
        <div class="file-directory">
            <img src="{{ asset('image/file-1453.png') }}" alt="file_image" title="file_image" width="50px" height="50px">
        </div>
        @else
        <div class="folder-directory" onclick="toggle(this)">
            <img src="{{ asset('image/285658_blue_folder_icon.png') }}" alt="folder_image" title="folder_image" width="50px" height="50px">
        </div>
    @endif
    <div class="directory-info">
            <p class="directory_name">{{ $project['name'] }}</p>
        @foreach ($project['data'] as $key => $value)
            @if ($project['type'] == 'file')
                @if ($key == "file_size")
                    <p><b>Size: </b>{{ $value }}</p>
                @endif
                @if ($key == "last_modified")
                    <p><b>Last Modified: </b>{{ $value }}</p>
                @endif
            @else
                @if ($key == "count_dir_files")
                    <p><b>Files: </b>{{ $value }}</p>
                @endif
                @if ($key == "get_directory_size")
                    <p><b>Size: </b>{{ $value }}</p>
                @endif
            @endif
        @endforeach
    </div>
</div>

@if ($project['subs'] != null)
    <div class="hide sub">
    @foreach($project['subs'] as $project)
        @include('partials.project', $project)
    @endforeach
    </div>
@endif