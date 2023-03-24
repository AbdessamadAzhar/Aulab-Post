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
                <x-articles-table :roleRequests="$unrevisionedArticles" />
            </div>
        </div>

        <div class="container my-5">
            <div class="row justify-content-conter">
                <div class="col-12">
                    <h2>Articoli pubblicati</h2>
                    <x-requests-table :roleRequests="$acceptedArticles"/>
                </div>
            </div>

            <div class="container my-5">
                <div class="row justify-content-conter">
                    <div class="col-12">
                        <h2>Articoli respinti</h2>
                        <x-requests-table :roleRequests="$rejectedArticles"/>
                    </div>
                </div>
            </div>

</x-layout>




















<div class="col-12">
    <h2>Richieste per il ruolo amministratore</h2>
    <x-requests-table :roleRequests="$adminRequests" role="amministratore" />
</div>
</div>
