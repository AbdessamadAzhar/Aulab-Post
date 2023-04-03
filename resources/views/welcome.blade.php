<x-layout>
    @if (session('message'))
        <div class="alert alert-success text-center">
            {{ session('message') }}
        </div>
    @endif

    <x-header>
        Aulab Post!
    </x-header>

    <header class="position relative">
        <div id="carouselWrapper" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselWrapper" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselWrapper" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselWrapper" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>

                <div class="carousel-item active slide1">
                    <div class="carousel-caption">
                    </div>

                </div>

                <div class="carousel-item slide2">
                    <div class="carousel-caption">
                    </div>

                </div>

                <div class="carousel-item slide3">
                    <div class="carousel-caption">
                    </div>
                </div>
            </div>
        </div>
        <x-header>
            Ultimi annunci
        </x-header>

        <div class="container my-5">
            <div class="row justify-content-around">
                @foreach ($articles as $article)
                    <div class="col-12 col-md-3">
                        <div class="card">
                            <img src="{{ Storage::url($article->image) }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $article->title }}</h5>
                                <p class="card-text">{{ $article->subtitle }}</p>
                                @if ($article->category)
                                    <a href="{{ route('article.byCategory', ['category' => $article->category->id]) }}"
                                        class="small text-muted fst-italic text capitalize">{{ $article->category->name }}</a>
                                @else
                                    <p class="small text-muted fst-italic text-capitalize">
                                        Non categorizzato
                                    </p>
                                @endif

                                <br>

                                @foreach ($article->tags as $tag)
                                    #{{ $tag->name }}
                                @endforeach
                                </p>
                                <span class="text-muted small fst-italic">- tempo di
                                    lettura{{ $article->readDuration() }}
                                    min</span>
                            </div>
                            <div class="card-footer text-muted d-flex justify-content-beetween align-items-center">
                                <a class=""
                                    href="{{ route('article.byUser', ['user' => $article->user->id]) }}">Redatto il
                                    {{ $article->created_at->format('d/m/y') }} da {{ $article->user->name }}</a>
                                <a href="{{ route('article.show', compact('article')) }}"
                                    class="btn btn-info text-white">Leggi</a>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>


</x-layout>
