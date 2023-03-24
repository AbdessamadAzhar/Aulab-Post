<table class="table table-striped table-hover border">
    <thread class="table-dark">
        <tr>
            <th dcope="col">#</th>
            <th dcope="col">Nome</th>
            <th dcope="col">Email</th>
            <th dcope="col">Azioni</th>
        </tr>
    </thread>
    <tbody>
        @foreach($roleRequest as $user)
        <tr>
            <th scope="row">{{$user->id}}</th>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>
                <button class="btn btn-info text-white">Attive {{$role}}</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>