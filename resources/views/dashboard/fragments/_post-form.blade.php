@csrf
{{-- Titulo --}}
<div>
    <label for="title">Titulo:</label>
    <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}"
        class="border {{ $errors->has('title') ? 'border-red-800' : 'border-gray-500' }} rounded-md form-control">
</div>

{{-- Slug --}}
<div>
    <label for="slug">Slug:</label>
    <input type="text" id="slug" name="slug" readonly value="{{ old('slug', $post->slug) }}"
        class="border {{ $errors->has('slug') ? 'border-red-800' : 'border-gray-500' }} rounded-md form-control">
</div>
{{-- Content --}}
<div>
    <label for="content">Contenido:</label>
    <textarea name="content" id="content"
        class="resize-none rounded-md border {{ $errors->has('content') ? 'border-red-800' : 'border-gray-500' }} form-control">{{ old('content', $post->content) }}</textarea>
</div>
{{-- Description --}}
<div>
    <label for="description">Descripcion:</label>
    <textarea name="description" id="description"
        class="resize-none rounded-md border {{ $errors->has('description') ? 'border-red-800' : 'border-gray-500' }} form-control">{{ old('description', $post->description) }}</textarea>
</div>
{{-- Image --}}
<div>
    <label for="image">Imagen:</label>
    <input type="file" id="image" name="image"/>
</div>
{{-- Posted --}}
<div>
    <label for="posted">Posteado:</label>
    <select name="posted" id="posted" class="form-control">
        <option {{ old('posted', $post->posted) == 'not' ? 'selected' : '' }} value="not">No</option>
        <option {{ old('posted', $post->posted) == 'yes' ? 'selected' : '' }} value="yes">Si</option>
    </select>
</div>
{{-- Category --}}
<div>
    <label for="category_id">Categoria:</label>
    <select name="category_id" id="category_id" class="form-control">
        @foreach ($categories as $title => $id)
            <option {{ old('category_id', $post->category_id) == $id ? 'selected' : '' }}
                value="{{ $id }}">{{ $title }}</option>
        @endforeach
    </select>
</div>
{{-- Input --}}
<input type="submit" class="btn btn-primary">
