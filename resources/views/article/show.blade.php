<x-layout>
    <x-header>
        {{ $article->title }}
    </x-header>

    <div class="container my-5">
        <div class="row justify-content-around">
            <div class="col-12 col-md-8">
                <img src="{{ Storage::url($article->image) }}" class="img-fluid my-3" alt="...">
                <div class="text-center">
                    <h2>{{ $article->subtitle }}</h2>
                </div>
                <div class="my-3 text-muted fst-italic">
                    <p>Redatto da {{ $article->user->name }} il {{ $article->created_at->format('d/m/y') }}</p>
                </div>
            </div>
            <hr>
            <p>{{ $article->body }}</p>
            <div class="text-center">
                <a href="{{ route('article.index') }}" class="btn btn-info text-white my-5">Torna indietro</a>
                @if (Auth::user($article->is_revisor))
                    <a
                        href="{{ route('revisor.acceptArticle', compact('article')) }}"class="btn btn-success text-white my-5">Accetta
                        l'articolo</a>
                    <a
                        href="{{ route('revisor.rejectArticle', compact('article')) }}"class="btn btn-danger text-white my-5">Rifiuta
                        l'articolo</a>
                @endif
            </div>
        </div>
    </div>


</x-layout>
