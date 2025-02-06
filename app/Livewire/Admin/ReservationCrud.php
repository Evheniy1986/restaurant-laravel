<?php

namespace App\Livewire\Admin;

use App\Enums\ReservationStatus;
use App\Enums\TableStatus;
use App\Models\Reservation;
use App\Models\Table;
use App\Rules\ReservationDate;
use App\Rules\ReservationTime;
use App\Services\AssignTableService;
use Carbon\Carbon;
use Livewire\Component;

class ReservationCrud extends Component
{
    public $reservations;
    public $name;
    public $phone;
    public $email;
    public $date;
    public $time;
    public $guests;
    public $comment;
    public $table_id;
    public $status;
    public $reservationId;
    public $isOpen = false;


    public function loadReservations()
    {
        $this->reservations = Reservation::all();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->reset();
    }

    public function create()
    {
        $this->reset();
        $this->openModal();
    }

    public function edit($id)
    {
        $reserve = Reservation::find($id);
        $this->reservationId = $reserve->id;
        $this->name = $reserve->name;
        $this->phone = $reserve->phone;
        $this->email = $reserve->email;
        $this->date = $reserve->date->format('Y-m-d');
        $this->time = $reserve->time->format('H:i:s');
        $this->guests = $reserve->guests;
        $this->comment = $reserve->comment;
        $this->status = $reserve->status;
        $this->table_id = $reserve->table_id;

        $this->openModal();
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|min:9',
            'email' => 'nullable|email',
            'date' => ['required', 'date', new ReservationDate()],
            'time' => ['required', new ReservationTime()],
            'guests' => 'required|integer|min:1',
            'comment' => 'nullable|string|max:1000',
        ];
    }


    public function save(AssignTableService $assignTableService)
    {
        $data = $this->validate();

        $data['status'] = $this->reservationId ? $this->status : 'pending';

        $existingReservation = $this->reservationId ? Reservation::find($this->reservationId) : null;

        $tableAvailable = $assignTableService->findAvailableTable($data['guests'], $data['date'], $data['time']);

        if ($existingReservation) {
            if ($existingReservation->table_id && $existingReservation->table_id != $tableAvailable?->id) {
                Table::where('id', $existingReservation->table_id)->update(['status' => TableStatus::AVAILABLE]);
            }

            $data['table_id'] = $existingReservation->table_id ?? $tableAvailable->id;
        } else {
            if (!$tableAvailable) {
                session()->flash('message', 'Нету свободных столиков на это время');
                return;
            }

            $data['table_id'] = $tableAvailable->id;
        }


        $reservation = Reservation::query()->updateOrCreate(['id' => $this->reservationId], $data);

        $this->changeStatus($reservation->id, $reservation->status->value);

        session()->flash('message', $this->reservationId ? 'Reservation updated successfully!' : 'Reservation created successfully!');
        $this->closeModal();
        $this->loadReservations();
    }

    public function changeStatus($id, $status)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update(['status' => $status]);

        if ($reservation->table) {
            match ($status) {
                ReservationStatus::CANCELED->value => $reservation->table->update(['status' => TableStatus::AVAILABLE]),
                ReservationStatus::CONFIRMED->value => $reservation->table->update(['status' => TableStatus::RESERVED]),
                default => null,
            };
        }

        session()->flash('message', 'Reservation status updated successfully!');
    }


    public function delete($id)
    {
        Reservation::findOrFail($id)->delete();
        session()->flash('message', 'Reservation deleted successfully!');
        $this->loadReservations();
    }

    public function render()
    {
        $this->loadReservations();
        return view('livewire.admin.reservation-crud', [
            'startTime' => Carbon::now()->isAfter(Carbon::now()->copy()->startOfDay()) ? Carbon::now()->copy()->addMinutes(15)->startOfMinute() : Carbon::now()->copy()->startOfHour(),
        ])
            ->extends('layouts.admin');
    }
}
