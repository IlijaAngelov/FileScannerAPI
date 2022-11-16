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
                <x-file-directory :folder="$key" />
            @else
                <x-folder-directory :folder="$key" />
            @endif
        </div>
        @endforeach
    @endif
</div>