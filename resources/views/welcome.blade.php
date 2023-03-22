<x-layout>
@if(session('message'))
<div class="alert alert-success text-center">
    {{session('message')}}
</div>
@endif
    <x-header>
        Aulab Post!
    </x-header>
    
</x-layout>
