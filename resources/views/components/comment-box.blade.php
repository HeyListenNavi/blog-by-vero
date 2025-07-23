@props([
    'action' => ''
])

<form action="{{ $action }}" method="POST" class="flex flex-col gap-2">
    @csrf
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <p style="color: red">{{ $error }}</p>
        @endforeach
    @endif

    <fieldset>
        <label for="comment">Comment</label>
        <textarea class="w-full border-[3px] p-2 border-foreground resize-none" placeholder="Enter your comment here" type="text" name="comment"></textarea>
    </fieldset>

    <x-button class="self-end" type="submit">Comment</x-button>
</form>
