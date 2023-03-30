<table class="table table-striped table-hover border">
    <thead class="table-dark">
        <tr>
            <th dcope="col">#</th>
            <th dcope="col">Titolo</th>
            <th dcope="col">Sottotitolo</th>
            <th dcope="col">Categoria</th>
            <th dcope="col">Tags</th>
            <th dcope="col">Creato il</th>
            <th dcope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($articles as $article)
            <tr>
                <th scope="row">{{ $article->id }}</th>
                <td>{{ $article->title }}</td>
                <td>{{ $article->subtitle }}</td>
                <td>{{ $article->category->name ?? 'Non categorizzato' }}</td>
                <td>
                    @foreach ($articles->tags as $tag)
                        {{ $tag->name }}
                    @endforeach
                </td>
                <td>{{ $article->created_at->format('d/m/y') }}</td>
                <td>
                    <a href="{{ route('article.show', compact('article')) }}" class="btn btn-info text-white">Leggi
                        l'articolo</a>
                    <a href="{{route('article.edit', compact('article'))}}" class="btn btn-warning text-white">Modifica l'articolo</a>
                    <form action="{{route('article.destroy' , compact('article'))}}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Elimina articolo</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
