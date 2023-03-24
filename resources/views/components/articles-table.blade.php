<table class="table table-striped table-hover border">
    <thead class="table-dark">
        <tr>
            <th dcope="col">#</th>
            <th dcope="col">Titolo</th>
            <th dcope="col">Sottotitolo</th>
            <th dcope="col">Redattore</th>
            <th dcope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($Articles as $article)
            <tr>
                <th scope="row">{{ $article->id }}</th>
                <td>{{ $article->title }}</td>
                <td>{{ $article->subtitle }}</td>
                <td>{{ $article->user->name }}</td>
                <td>
                    @if (is_null($article->is_accepted))
                        <a href="{{route('article.show', compact('article'))}}" class="btn btn-info text-white">leggi l'articolo</a>
                    @else
                        <a href="{{route('revisor.undoArticle')}}" class="btn btn-info text-white">Riporta in revisione</a>
                    @endif

                </td>
            </tr>
        @endforeach
    </tbody>
</table>
