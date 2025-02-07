<div>

    @include('livewire.includes.flash_message')

    <button wire:click="create" class="btn btn-success m-3">Add Table</button>
    <a class="btn btn-primary" href="{{ route('admin.role') }}">Role</a>

    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{  $user->roles->pluck('role')->implode(', ') }}</td>
                <td>
                    <button wire:click="edit({{ $user->id }})" class="btn btn-sm btn-primary">Edit</button>
                    <button wire:click="delete({{ $user->id }})"
                            wire:confirm="Are you sure"
                            class="btn btn-sm btn-danger">Delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @if($isOpen)
        <div class="modal fade show" tabindex="-1" style="display: block;" aria-modal="true" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $userId ? 'Edit Table' : 'Create Table' }}</h5>
                        <button type="button" class="close" wire:click="closeModal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>

                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="save">
                            <div class="form-group">
                                <label for="name">Имя</label>
                                <input type="text" class="form-control" id="name" wire:model="name">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Е-mail</label>
                                <input type="email" class="form-control" id="email" wire:model="email">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Пароль</label>
                                <input type="text" class="form-control" id="password" wire:model="password">
                                @error('password')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Подтвердите пароль</label>
                                <input type="text" class="form-control" id="password_confirmation"
                                       wire:model="password_confirmation">
                                @error('password_confirmation')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status">Role</label>
                                <select class="form-control" wire:model="role_id">
                                    <option>Open this select menu</option>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->role }}</option>
                                    @endforeach
                                </select>
                                @error('role_id') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="form-group text-right">
                                <button type="button" class="btn btn-secondary" wire:click="closeModal">Cancel</button>
                                <button type="submit"
                                        class="btn btn-primary">{{ $userId ? 'Save Changes' : 'Create Category' }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-backdrop fade show" wire:click="closeModal"></div>
    @endif
</div>
