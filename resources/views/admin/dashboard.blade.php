<x-layout>
     <x-header>
        Bentornato, Amministratore
     </x-header>

     @if(session('message'))
         <div class="alert alert-success text-center">
            {{session('message')}}
         </div>
     @endif
           
     <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richieste per il ruolo amministratore</h2>
                <x-requests-table :roleRequests="$adminRequests" role="amministratore"/>
        </div>
     </div>

     <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richieste per il ruolo revisore</h2>
                <x-requests-table :roleRequests="$revisorRequests" role="revisore"/>
        </div>
     </div>

     <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2>Richieste per il ruolo redattore</h2>
                <x-requests-table :roleRequests="$writerRequests" role="redattore"/>
        </div>
     </div>
     
</x-layout>