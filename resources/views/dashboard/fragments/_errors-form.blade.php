@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p class="text-sm text-red-800">{{ $error }}</p>
    @endforeach
@endif
