<div class="card p-4">
    <h4>{{ $roleId ? 'Редактировать роль' : 'Добавить роль' }}</h4>

    <form class="" wire:submit="save">
        <div class="mb-3">
            <label class="form-label">Название роли</label>
            <input type="text" class="form-control" wire:model="role">
            @error('role') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-primary">Сохранить</button>
        <button type="button" class="btn btn-secondary" wire:click="resetForm">Очистить</button>
    </form>
</div>
