<x-layout>
    <div class="container-fluid p-5 header text-center text-white">
        <div class="row justify-content-center">
            <h1 class="display-1 tx-2">
                Tutti gli articoli per: {{$query}}
            </h1>
        </div>
    </div>

    <div class="container my-5">
        <div class="row justify-content-around">
            @foreach ($articles as $article)
                <div class="col-12 col-md-3">
                    <div class="card h-100">
                        <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->subtitle }}</p>
                            <a href="{{ route('article.byCategory', ['category' => $article->category->id]) }}"
                                class="small text-muted fst-italic text capitalize">{{ $article->category->name }}</a>
                            <a href="{{ route('article.byUser', ['user' => $article->user->id]) }}"
                                class="small text-muted fst-italic text capitalize">{{ $article->user->name }}</a>
                        </div>
                        <div class="card-footer text-muted d-flex justify-content-beetween align-items-center">
                            Redatto il {{ $article->created_at->format('d/m/y') }} da {{ $article->user->name }}
                            <a href="{{ route('article.show', compact('article')) }}"
                                class="btn btn-info text-white">Leggi</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


</x-layout>
