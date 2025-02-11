<div>
    @include('livewire.includes.flash_message')

    <!-- Кнопка для открытия модального окна -->
    <button wire:click="create" class="btn btn-success m-3">Add Dish</button>

    <!-- Таблица категорий -->
    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>image</th>
            <th>Description</th>
            <th>Category</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($menus as $menu)
            <tr>
                <td >{{ $menu->name }}</td>
                <td><img style="width: 100px; height: 100px"
                         src="{{ \Illuminate\Support\Facades\Storage::url($menu->image)}}" alt=""></td>
                <td>{{ $menu->description }}</td>
                <td>{{ $menu->category->name }}</td>
                <td class="btn-group">
                    <button wire:click="show({{ $menu->id }})" class="btn btn-sm btn-outline-secondary">Show</button>
                    <button wire:click="edit({{ $menu->id }})" class="btn btn-sm btn-primary">Edit</button>
                    <button wire:click="delete({{ $menu->id }})"
                            wire:confirm="Are you sure"
                            class="btn btn-sm btn-danger">Delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @if($isShow && $showMenu)
        <div class="modal fade show" tabindex="-1" style="display: block;" aria-modal="true" role="dialog">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Просмотр меню: {{ $showMenu->name }}</h5>
                        <button type="button" class="close" wire:click="closeModal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <tbody>
                            <tr><td>ID</td><td>{{ $showMenu->id }}</td></tr>
                            <tr><td>Код</td><td>{{ $showMenu->slug }}</td></tr>
                            <tr><td>Название</td><td>{{ $showMenu->name }}</td></tr>
                            <tr><td>Название англ</td><td>{{ $showMenu->name_en }}</td></tr>
                            <tr><td>Описание</td><td>{{ $showMenu->description }}</td></tr>
                            <tr><td>Описание англ</td><td>{{ $showMenu->description_en }}</td></tr>
                            <tr>
                                <td>Картинка</td>
                                <td><img src="{{ Storage::url($showMenu->image) }}" alt="" width="100"></td>
                            </tr>
                            <tr><td>Категория</td><td>{{ $showMenu->category->name }}</td></tr>
                            <tr><td>Вес</td><td>{{ $showMenu->weight }} г</td></tr>
                            <tr><td>Цена</td><td>{{ $showMenu->price }} грн</td></tr>
                            <tr><td>Старая Цена</td><td>{{ $showMenu->old_price ?? '—' }} грн</td></tr>
                            <tr>
                                <td>Лейблы</td>
                                <td>
                                    @if($showMenu->is_new) <span class="badge bg-success">Новинка</span> @endif
                                    @if($showMenu->is_hit) <span class="badge bg-danger">Хит продаж</span> @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-backdrop fade show" wire:click="closeModal"></div>
    @endif

    @if($isOpen)
        <div class="modal fade show" tabindex="-1" style="display: block;" aria-modal="true" role="dialog">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $menuId ? 'Edit Dish' : 'Create Dish' }}</h5>
                        <button type="button" class="close" wire:click="closeModal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="save">
                            <div class="form-group">
                                <label for="name_ua">Name UA</label>
                                <input type="text" class="form-control" id="name_ua" wire:model="name">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group">
                                <label for="name_en">Name EN</label>
                                <input type="text" class="form-control" id="name_en" wire:model="name_en">
                                @error('name_en')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group">
                                <label for="description_ua">Description</label>
                                <input type="text" class="form-control" id="description_ua" wire:model="description">
                                @error('description')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group">
                                <label for="description_en">Description EN</label>
                                <input type="text" class="form-control" id="description_en" wire:model="description_en">
                                @error('description_en')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input type="text" class="form-control" id="slug" wire:model="slug">
                                @error('slug')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                            @if ($old_image)
                                <p>old image</p>
                                <img style="height: 100px; width: 100px" class="img-fluid"
                                     src="{{  \Illuminate\Support\Facades\Storage::url($old_image) }}">
                            @endif
                            @if ($image)
                                <p>new image</p>
                                <img style="height: 100px; width: 100px" class="img-fluid"
                                     src="{{  $image->temporaryUrl() }}">
                            @endif
                            <div class="form-group">
                                <label for="formFile">Image Upload</label>
                                <input class="form-control" type="file" id="formFile" wire:model="image">
                                @error('image')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group">
                                <label for="weight">Weight</label>
                                <input type="text" class="form-control" id="weight" wire:model="weight">
                                @error('weight')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="text" class="form-control" id="price" wire:model="price">
                                @error('price')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group">
                                <label for="old_price">Old Price</label>
                                <input type="number" class="form-control" id="old_price" wire:model="old_price">
                                @error('old_price')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group ml-5">
                                <input class="form-check-input" type="checkbox" wire:model="is_new" id="is_new">
                                <label class="form-check-label" for="is_new">Новинка</label>
                                @error('is_new')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group ml-5">
                                <input class="form-check-input" type="checkbox" wire:model="is_hit" id="is_hit">
                                <label class="form-check-label" for="is_hit">Хит продаж</label>
                                @error('is_hit')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group">
                                <label for="status">Категории</label>
                                <select class="form-control" wire:model="category_id">
                                    <option value="" selected>Выберите статус</option>
                                    @foreach($categories as $cat)
                                        <option value="{{ $cat->id }}">{{ ($cat->name) }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group text-right">
                                <button type="button" class="btn btn-secondary" wire:click="closeModal">Cancel</button>
                                <button type="submit" class="btn btn-primary">
                                    {{ $menuId ? 'Save Changes' : 'Create Category' }}
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal-backdrop fade show" wire:click="closeModal"></div>
    @endif


</div>
