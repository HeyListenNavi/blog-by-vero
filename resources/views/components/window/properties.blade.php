@props(['name', 'appName' => null, 'icon', 'extension', 'description', 'size', 'date', 'location'])
<x-window.desktop
    :name="$name"
    :buttons="['close']"
    {{ $attributes->merge(['class' => 'absolute w-fit']) }}
>
    <ul class="relative flex flex-col gap-2 p-2">
        <li class="flex flex-col gap-0">
            <span class="font-bold">
                Title
            </span>
            {{ $name }}
        </li>

        <li class="flex flex-col gap-0">
            <span class="font-bold">
                Icon
            </span>
            {{ $icon }}
        </li>

        <li class="flex flex-col gap-0">
            <span class="font-bold">
                File
            </span>
            {{ Str::slug($name) }}.{{ $extension }}
        </li>

        <li class="flex flex-col gap-0">
            <span class="font-bold">
                Description
            </span>
            {{ $description }}
        </li>

        <li class="flex flex-col gap-0">
            <span class="font-bold">
                Size
            </span>
            {{ $size }} KB
        </li>

        <li class="flex flex-col gap-0">
            <span class="font-bold">
                Date
            </span>
            {{ $date }}
        </li>

        <li class="flex flex-col gap-0">
            <span class="font-bold">
                Location
            </span>
            {{ $location }}
        </li>

        <li class="flex flex-col gap-0">
            <span class="font-bold">
                Id
            </span>
            <span
                x-data
                x-text="$store.windowManager.get(id)?.id"
            ></span>
        </li>

        <li>{{ config('app.name') }}</li>

        <li
            class="absolute right-0 top-0 px-6 py-2"
            x-data="{
                copied: false,
                get appId() {
                    return @js($appName ?? $name).toLowerCase().replace(/\s+/g, '-');
                },
                shareUrl() {
                    return window.location.origin + '/?app=' + this.appId;
                },
                copy() {
                    navigator.clipboard.writeText(this.shareUrl()).then(() => {
                        this.copied = true;
                        setTimeout(() => this.copied = false, 2000);
                    });
                }
            }"
        >
            <button
                class="font-emoji hover:text-highlight w-fit cursor-pointer text-left text-2xl transition-colors"
                href=""
                x-on:click="copy"
                x-show="!copied"
            >
                4
            </button>
            <button
                class="w-full text-left text-sm"
                type="button"
                x-show="copied"
                disabled
            >
                Copied!
            </button>
        </li>
    </ul>
</x-window.desktop>
