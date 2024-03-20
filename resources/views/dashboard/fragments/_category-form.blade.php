@csrf
{{-- Titulo --}}
<div>
    <label for="title">Titulo:</label>
    <input type="text" id="title" name="title" value="{{ old('title', $category->title) }}"
        class="border {{ $errors->has('title') ? 'border-red-800' : 'border-gray-500' }} rounded-md form-control">
</div>

{{-- Slug --}}
<div>
    <label for="slug">Slug:</label>
    <input type="text" id="slug" name="slug" readonly value="{{ old('slug', $category->slug) }}"
        class="border {{ $errors->has('slug') ? 'border-red-800' : 'border-gray-500' }} rounded-md form-control">
</div>

{{-- Input --}}
<input type="submit" class="btn btn-primary">
