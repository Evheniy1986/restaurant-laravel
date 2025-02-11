<div>
    @include('livewire.includes.flash_message')

    <button wire:click="create" class="btn btn-success m-3">Add Slider</button>

    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>image</th>
            <th>Description</th>
            <th>Link</th>
            <th>Is Active</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sliders as $slider)
            <tr>
                <td>{{ $slider->title }}</td>
                <td><img style="width: 200px; height: 100px"
                         src="{{ \Illuminate\Support\Facades\Storage::url($slider->image)}}" alt=""></td>
                <td>{{ $slider->description }}</td>
                <td>{{ $slider->link }}</td>
                <td>{{ $slider->is_active ? 'Активная' : 'Нет' }}</td>
                <td class="btn-group">
                    <button wire:click="show({{ $slider->id }})" class="btn btn-sm btn-outline-secondary">Show</button>
                    <button wire:click="edit({{ $slider->id }})" class="btn btn-sm btn-primary">Edit</button>
                    <button wire:click="delete({{ $slider->id }})"
                            wire:confirm="Are you sure"
                            class="btn btn-sm btn-danger">Delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    @if($isShow && $showSlider)
        <div class="modal fade show" tabindex="-1" style="display: block;" aria-modal="true" role="dialog">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Просмотр меню: {{ $showSlider->name }}</h5>
                        <button type="button" class="close" wire:click="closeModal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table">
                            <tbody>
                            <tr><td>ID</td><td>{{ $showSlider->id }}</td></tr>
                            <tr><td>Название</td><td>{{ $showSlider->title }}</td></tr>
                            <tr><td>Название англ</td><td>{{ $showSlider->title_en }}</td></tr>
                            <tr><td>Описание</td><td>{{ $showSlider->description }}</td></tr>
                            <tr><td>Описание англ</td><td>{{ $showSlider->description_en }}</td></tr>
                            <tr>
                                <td>Картинка</td>
                                <td><img src="{{ Storage::url($showSlider->image) }}" alt="" height="150" width="300"></td>
                            </tr>
                            <tr><td>Ссылка</td><td>{{ $showSlider->link }}</td></tr>
                            <tr>
                                <td>Лейблы</td>
                                <td>
                                    @if($showSlider->is_active) <span class="badge bg-success">Активный</span> @endif
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
                        <h5 class="modal-title">{{ $sliderId ? 'Edit Slider' : 'Create Slider' }}</h5>
                        <button type="button" class="close" wire:click="closeModal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="save">
                            <div class="form-group">
                                <label for="name_ua">Name UA</label>
                                <input type="text" class="form-control" id="name_ua" wire:model="title">
                                @error('title')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group">
                                <label for="name_en">Name EN</label>
                                <input type="text" class="form-control" id="name_en" wire:model="title_en">
                                @error('title_en')
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
                                <label for="weight">Link</label>
                                <input type="text" class="form-control" id="link" wire:model="link">
                                @error('link')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group">
                                <label for="price">Sort</label>
                                <input type="number" class="form-control" id="price" wire:model="order">
                                @error('order')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group ml-5">
                                <input class="form-check-input" type="checkbox" wire:model="is_active" id="is_active">
                                <label class="form-check-label" for="is_active">Активный сладер</label>
                                @error('is_active')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group text-right">
                                <button type="button" class="btn btn-secondary" wire:click="closeModal">Cancel</button>
                                <button type="submit" class="btn btn-primary">
                                    {{ $sliderId ? 'Save Changes' : 'Create Slider' }}
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
