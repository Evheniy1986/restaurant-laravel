<div>
    <table class="table mt-5">
        <thead>
        <tr>
            <th>Id</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->role }}</td>
                            <td>
                                <button wire:click="edit({{ $role->id }})" class="btn btn-sm btn-primary">Edit</button>
                                <button wire:click="delete({{ $role->id }})"
                                        wire:confirm="Are you sure"
                                        class="btn btn-sm btn-danger">Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
        </tbody>
    </table>
</div>
