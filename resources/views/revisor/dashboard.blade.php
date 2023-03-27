<x-layout>
    <x-header>
        Bentornato, Revisore
    </x-header>

    @if (session('message'))
        <div class="alert alert-success text-center">
            {{ session('message') }}
        </div>
    @endif

    <div class="container my-5">
        <div class="row justify-content-conter">
            <div class="col-12">
                <h2>Articoli da revisionare</h2>
                <x-articles-table :articles="$unrevisionedArticles" />
            </div>
        </div>

        <div class="container my-5">
            <div class="row justify-content-conter">
                <div class="col-12">
                    <h2>Articoli pubblicati</h2>
                    <x-articles-table :articles="$acceptedArticles"/>
                </div>
            </div>

            <div class="container my-5">
                <div class="row justify-content-conter">
                    <div class="col-12">
                        <h2>Articoli respinti</h2>
                        <x-articles-table :articles="$rejectedArticles"/>
                    </div>
                </div>
            </div>

</x-layout>


