<x-layout>
    <x-slot name="filebrowser">
        <div>
            @foreach ($response as $folder)
                <x-folder-card :folder="$folder" />
            @endforeach
        </div>
    </x-slot>
</x-layout>
