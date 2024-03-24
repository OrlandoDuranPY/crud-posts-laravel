<div>
    {{ $header }}

    @forelse ($posts as $post)
        <div class="card card-white mb-2 border border-gray-300">
            <h3>{{ $post->title }}</h3>
            <p>{{ $post->description }}</p>
            <a href={{ route('web.blog.show', $post) }}>Ver</a>
        </div>

    @empty
        <p>No hay posts por mostrar</p>
    @endforelse
    {{ $posts->links() }}

    {{$footer}}
</div>
