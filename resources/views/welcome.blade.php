<x-layout>
    @if (session('message'))
        <div class="alert alert-success text-center">
            {{ session('message') }}
        </div>
    @endif
    <x-header>
        Aulab Post!
    </x-header>

    <div class="container my-5">
        <div class="row justify-content-around">
            @foreach ($articles as $article)
                <div class="col-12 col-md-3">
                    <div class="card">
                        <img src="{{Storage::url($article->image)}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->title }}</h5>
                            <p class="card-text">{{ $article->subtitle }}</p>
                            <a href="{{route('article.byCategory', ['category'=>$article->category->id])}}" class="small text-muted fst-italic text capitalize">{{$article->category->name}}</a>
                            <a href="{{route('article.byUser', ['user'=>$article->user->id])}}" class="small text-muted fst-italic text capitalize">{{$article->user->name}}</a>
                        </div>
                        <div class="card-footer text-muted d-flex justify-content-beetween align-items-center">
                            Redatto il {{$article->created_at->format('d/m/y')}} da {{$article->user->name}}
                            <a href="{{route('article.show', compact('article'))}}" class="btn btn-info text-white">Leggi</a> 
                        </div>
                        <p class="small fst-italic text-capitalize">
                            @foreach($article->tags as $tag)
                                #{{$tag->name}}
                            @endforeach
                            </p>
                
                            @if($article->category)
                                <a href="{{route('article.byCategory', ['category' => $article->category->id])}}" class="small text-muted fst-italic text-capitalize">{{$article->category->name}}</a>
                            @else
                                <p class="small text-muted fst-italic text-capitalize">
                                    Non categorizzato
                                </p>
                            @endif

                            <span class="text-muted small fst-italic">- tempo di lettura{{$article->readDuration()}} min</span>
                            <hr>
                            <p class="small fst-italic text-capitalize">
                                @foreach($article->tags as $tag)
                                    #{{$tag->name}}
                                @endforeach
                            </p>
                    </div>
                        <div class="card-footer text-muted d-flex justify-content-between align-items-center">
                            <a class="" href="{{route('article.byUser', ['user' => $article->user->id])}}">Redatto il {{$article->created_at->format('d/m/Y')}} da {{$article->user->name}}</a>
                            <a href="{{route('article.show',compact('article'))}}" class="btn btn-info text-white">leggi</a>
                        </div>
                </div>
            @endforeach
        </div>
    </div> 


</x-layout>
