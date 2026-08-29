@props(['gradientBottom' => 'from-white/30 via-white/10'])

<div {{ $attributes->merge(['class' => 'group relative w-full h-65 md:h-100 lg:h-70 rounded-xl p-4 flex flex-col relative overflow-hidden']) }}>
    <!-- Black fade overlay on top/sides -->
    <div class="z-10 absolute inset-0 bg-linear-to-b from-black/70 via-transparent to-transparent pointer-events-none"></div>
    <!-- Black fade left -->
    <div class="z-10 absolute inset-0 bg-linear-to-r from-black/80 via-transparent to-transparent pointer-events-none"></div>
    <!-- Black fade right -->
    <div class="z-10 absolute inset-0 bg-linear-to-l from-black/80 via-transparent to-transparent pointer-events-none"></div>
    <!-- White fade on bottom -->
    <div class="z-10 absolute inset-x-0 bottom-0 h-40 bg-linear-to-t {{ $gradientBottom }} to-transparent pointer-events-none"></div>
    {{ $slot }}
</div>