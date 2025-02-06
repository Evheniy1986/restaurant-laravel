<div>

    @include('livewire.includes.flash_message')

    <button wire:click="create" class="btn btn-success m-3">Add Reservation</button>

    <table class="table">
        <thead>
        <tr>
            <th>Name</th>
            <th>Time</th>
            <th>Date</th>
            <th>Guests</th>
            <th>Статус</th>
            <th>Table №</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($reservations as $reservation)
            <tr>
                <td>{{ $reservation->name }}</td>
                <td>{{ $reservation->time }}</td>
                <td>{{ $reservation->date->format('Y-m-d') }}</td>
                <td>{{ $reservation->guests }}</td>
                <td>{{ $reservation->status->label() }}</td>
                <td>{{ $reservation->table->name }}</td>
                <td>
                    @foreach(\App\Enums\ReservationStatus::cases() as $case)
                        <button type="button"
                                wire:click="changeStatus({{ $reservation->id }}, '{{ $case->value }}')"
                                wire:confirm="Are you sure to change status"
                                class="btn btn-sm {{ $case->color() }}"
                                @if($case->value === $reservation->status->value) disabled @endif>
                            {{ $case->value }}
                        </button>
                    @endforeach
                </td>
                <td>
                    <button wire:click="edit({{ $reservation->id }})" class="btn btn-sm btn-primary">Edit</button>
                    <button wire:click="delete({{ $reservation->id }})"
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
                        <h5 class="modal-title">{{ $reservationId ? 'Редактировать Резервацию' : 'Зарезервировать' }}</h5>
                        <button type="button" class="close" wire:click="closeModal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form wire:submit.prevent="save" class="row g-3 form-reserve">
                            <div class="col-12 mb-3">
                                <label for="inputName" class="form-label">Имя</label>
                                <input type="text" class="form-control" wire:model="name" id="inputName"
                                       placeholder="Ваше имя">
                                @error('name')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label for="inputPhone" class="form-label">Номер телефона</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">+380</span>
                                    <input type="tel" class="form-control" wire:model="phone" id="inputPhone"
                                           placeholder="XXXXXXXXX" aria-describedby="basic-addon1">
                                </div>
                                @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col-12 mb-3">
                                <label for="inputEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" wire:model="email" id="inputEmail">
                                @error('email')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-sm-5 mb-3">
                                <label for="inputDate" class="form-label">Дата</label>
                                <input class="form-control" min="{{ now()->format('Y-m-d') }}"
                                       max="{{ now()->addDays(7)->format('Y-m-d')}}" type="date" wire:model="date"
                                       id="inputDate">
                                @error('date')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-sm-4 mb-3">
                                <label for="inputTime" class="form-label">Время</label>
                                <input class="form-control" min="{{ \Carbon\Carbon::createFromTime(11, 0, 0) }}"
                                       max="{{ \Carbon\Carbon::createFromTime(11, 0, 0) }}" type="time"
                                       wire:model="time" id="inputTime">
                                @error('time')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="col-sm-3 mb-3">
                                <label for="inputGuest" class="form-label">Гости</label>
                                <select id="inputGuest" wire:model="guests" class="form-control">
                                    <option disabled hidden value="">Выберите количество гостей</option>
                                    @for($i=1; $i<=10; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                                @error('guests')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            @if($reservationId)
                                <div class="col-12 mb-3">
                                    <label for="inputGuest" class="form-label">Статус резервации</label>
                                    <select id="inputGuest" wire:model="status" class="form-control">
                                        <option disabled hidden value="">Выберите статус резерва</option>
                                        @foreach(\App\Enums\ReservationStatus::cases() as $reserv)
                                            <option
                                                value="{{ $reserv->value }}">{{ strtolower($reserv->name) }}</option>
                                        @endforeach
                                    </select>
                                    @error('guests')
                                    <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            @endif

                            <div class="col-12 mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Комментарий</label>
                                <textarea class="form-control" wire:model="comment" id="exampleFormControlTextarea1"
                                          rows="3"></textarea>
                                @error('comment')
                                <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group text-right">
                                <button type="button" class="btn btn-secondary" wire:click="closeModal">Отмена</button>
                                <button type="submit" class="btn btn-success">
                                    {{ $reservationId ? 'Редактировать Резервацию' : 'Зарезервировать' }}
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
