@props(['spacing' => 'gap-x-2 sm:gap-x-5'])

<div class="flex flex-row flex-wrap {{ $spacing }} md:gap-y-1 w-full">
    {{ $slot }}
</div>