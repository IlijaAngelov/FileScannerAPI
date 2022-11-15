@props(['folder'])
<div class="block" style="align-items:center">
        @if ($folder['type'] == "file")
            <x-file-directory :folder="$folder" />
        @else
            <x-folder-directory :folder="$folder" />
        @endif

        {{-- SUBS DIRECTORY --}}
        @if ($folder['subs'])
            @foreach ($folder['subs'] as $key)
            <div class="sub hide">
                @if ($key['type'] == "file")

                    <div class="file-directory" style="display: flex; margin-left: 20px;">
                        <div>
                            <img src="{{ asset('image/file.jpg') }}" alt="file_image" title="file_image" width="100px" height="100px">
                        </div>
                        <div>
                            <p>{{ $key['name'] }}</p>
                            @foreach ($key['data'] as $key => $value)
                                @if ($key == "file_size")
                                    <p><b>Size: </b>{{ $value }}</p>
                                @endif
                                @if ($key == "last_modified")
                                    <p><b>Last Modified: </b>{{ $value }}</p>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    @else

                    <div class="folder-directory" style="display: flex; margin-left: 20px;" onclick="toggle(this)">
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

                    @endif

            </div>
            @endforeach
        @endif
</div>