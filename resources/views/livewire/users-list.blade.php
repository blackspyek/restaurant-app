<div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Email</th>
            <th scope="col">Name</th>
            <th scope="col">Handle</th>
        </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td >{{ $user->email }}</td>
                    <td >{{ $user->name }}</td>

                    <td>
                        <button type="button" wire:click="alertConfirm({{ $user->id }})" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
    <button type="button" class="btn btn-link" data-mdb-ripple-init data-mdb-ripple-color="dark" onclick="window.location.href='{{ route("adduser") }}'">Add User</button>
</div>
