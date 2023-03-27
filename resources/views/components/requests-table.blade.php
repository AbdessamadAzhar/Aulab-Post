<table class="table table-striped table-hover border">
    <thead class="table-dark">
        <tr>
            <th dcope="col">#</th>
            <th dcope="col">Nome</th>
            <th dcope="col">Email</th>
            <th dcope="col">Azioni</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($roleRequests as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @switch($role)
                        @case('amministratore')
                            <a href="{{route('admin.setAdmin', compact('user'))}}" class="btn bnt-info text-white">Attiva {{ $role }}</a>
                        @break
                        @case('revisore')
                            <a href="{{route('admin.setRevisor', compact('user'))}}" class="btn bnt-info text-white">Attiva {{ $role }}</a>
                        @break
                        @case('redattore')
                            <a href="{{route('admin.setWriter', compact('user'))}}" class="btn bnt-info text-white">Attiva {{ $role }}</a>
                        @break
                        @default
                    @endswitch
                </td>
                
            </tr>
        @endforeach
    </tbody>
</table>

