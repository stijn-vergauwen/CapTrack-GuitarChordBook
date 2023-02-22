@props([
    'pageTitle',
])

<main class="flex flex-col min-h-screen">
    <x-title :text="$pageTitle" />

    <div class="px-40 flex gap-24">

        <div class="w-64">
            {{ $left ?? '' }}
        </div>

        {{ $slot }}

        <div class="w-64">
            {{ $right ?? '' }}
        </div>

    </div>
</main>