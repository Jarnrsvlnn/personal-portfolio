@props([
    'bonito' => 'social',
    'link'
    ])

@if ($bonito == 'social')
    <a href="{{ $link }}" target="_blank" rel="noopener noreferrer" class="group flex flex-row justify-between items-center p-1 w-full cursor-pointer transition-all duration-50 ease-out hover:bg-green-600 rounded-sm">
        {{ $slot }}
    </a>
@else
    <div id="open-dialog" class="group flex flex-row justify-between items-center w-full cursor-pointer p-1 transition-all duration-50 ease-out hover:bg-green-600 rounded-sm">
        {{ $slot }}
    </div>
@endif
