<x-layout>
    <x-slot name="filebrowser">
        <div style="background-color: white; padding-top: 10px;">
            @foreach ($response as $folder)
                <x-folder-card :folder="$folder" />
                {{-- <hr style="margin-bottom: 10px;"> --}}
            @endforeach
        </div>
    </x-slot>
</x-layout>
