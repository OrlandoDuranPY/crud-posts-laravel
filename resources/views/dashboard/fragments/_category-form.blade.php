@csrf
{{-- Titulo --}}
<div>
    <label for="title">Titulo:</label>
    <input type="text" id="title" name="title" value="{{ old('title', $category->title) }}"
        class="border {{ $errors->has('title') ? 'border-red-800' : 'border-gray-500' }} rounded-md">
</div>

{{-- Slug --}}
<div>
    <label for="slug">Slug:</label>
    <input type="text" id="slug" name="slug" readonly value="{{ old('slug', $category->slug) }}"
        class="border {{ $errors->has('slug') ? 'border-red-800' : 'border-gray-500' }} rounded-md">
</div>

{{-- Input --}}
<input type="submit" class="py-1 px-3 bg-zinc-800 rounded-md text-white">
