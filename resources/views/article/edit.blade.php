<x-layout>
    <x-header>
        Modifica un' articolo
    </x-header>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <form class="p-5 border shadow" method="POST" action="{{route('article.update', compact('article'))}}"
                    enctype="multipart/form-data">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @csrf

                    @method('put')

                    <div class="mb-3">
                        <label for="title" class="form-label">Titolo:</label>
                        <input type="text" name="title" id="title" class="form-control"
                            value="{{ $article->title }}">
                    </div>
                    <div class="mb-3">
                        <label for="subtitle" class="form-label">Sottotitolo:</label>
                        <input type="text" name="subtitle" id="subtitle" class="form-control"
                            value="{{ $article->subtitle }}">
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Immagine:</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="mt-3">
                        <label for="category" class="form-label">Categoria:</label>
                        <select name="category" id="category" class="form-control text-capitalize">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if ($article->category && $category->id == $article->category->id) selected @endif>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tags" class="form-label">Tags:</label>
                        <input name="tags" id="tags" class="form-control"
                            value="{{ $article->tags->implode('name', ',') }}">
                        <span class="small fst-italic"> Dividi ogni tag con una virgola</span>
                    </div>
                    <div class="mt-3">
                        <label for="body" class="form-label">Corpo del testo:</label>
                        <textarea name="body" id="body" cols="30" rows="7" class="form-control">{{ $article->body }}</textarea>
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-warning text-white">Aggiorna un'articolo </button>
                        <a class="btn btn-outline-info" href="{{ route('homepage') }}">Torna alla home</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
