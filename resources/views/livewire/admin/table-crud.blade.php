<div>
    <!-- Уведомления об успехе -->
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    <!-- Кнопка для открытия модального окна -->
    <button wire:click="create" class="btn btn-success m-3">Add Category</button>

    <!-- Таблица категорий -->
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Guest Number</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tables as $table)
            <tr>
                <td>{{ $table->name }}</td>
                <td>{{ $table->guest_number }}</td>
                <td>
                    @foreach(\App\Enums\TableStatus::cases() as $case)
                        <button type="button"
                                wire:click="changeStatus({{ $table->id }}, '{{ $case->value }}')"
                                wire:confirm="Are you sure to change status"
                                class="btn btn-sm {{ $case->color() }}"
                                @if($case->value === $table->status->value) disabled @endif>
                            {{ ucfirst($case->value) }}
                        </button>
                    @endforeach
                </td>
                <td>
                    <button wire:click="edit({{ $table->id }})" class="btn btn-primary">Edit</button>
                    <button wire:click="delete({{ $table->id }})"
                            wire:confirm="Are you sure"
                            class="btn btn-danger">Delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Модальное окно для создания/редактирования -->
    @if($isOpen)
        <div class="modal fade show" tabindex="-1" style="display: block;" aria-modal="true" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $tableId ? 'Edit Category' : 'Create Category' }}</h5>
                        <button type="button" class="close" wire:click="closeModal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="save">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" wire:model="name">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Name EN</label>
                                <input type="text" class="form-control" id="name" wire:model="guest_number">
                                @error('guest_number')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" wire:model="status">
                                    <option>Open this select menu</option>
                                    @foreach(\App\Enums\TableStatus::cases() as $table)
                                        <option value="{{ $table->value }}">{{ $table->value }}</option>
                                    @endforeach
                                </select>
                                @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group text-right">
                                <button type="button" class="btn btn-secondary" wire:click="closeModal">Cancel</button>
                                <button type="submit"
                                        class="btn btn-primary">{{ $tableId ? 'Save Changes' : 'Create Category' }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-backdrop fade show" wire:click="closeModal"></div>
    @endif
</div>
