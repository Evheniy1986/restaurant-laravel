<?php

namespace App\Livewire\Admin;

use App\Enums\TableStatus;
use App\Models\Table;
use Livewire\Attributes\Validate;
use Livewire\Component;

class TableCrud extends Component
{
    public $tables;
    #[Validate('required|string|max:255')]
    public $name;
    #[Validate('required|integer')]
    public $guest_number;

    #[Validate('nullable')]
    public $status;

    public $isOpen = false;
    public $tableId = null;

    public function load()
    {
        $this->tables = Table::all();
    }

    public function create()
    {
        $this->openModal();
        $this->resetFields();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }


    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetFields();
    }

    public function edit($id)
    {
        $table = Table::find($id);
        $this->tableId = $table->id;
        $this->name = $table->name;
        $this->guest_number = $table->guest_number;
        $this->status = $table->status;

        $this->openModal();
    }

    public function save()
    {
        $data = $this->validate();

        $data['status'] = $this->tableId ? $this->status : TableStatus::AVAILABLE;

        Table::query()->updateOrCreate(['id' => $this->tableId], $data);

        session()->flash('message', $this->tableId ? 'Table updated successfully!' : 'Table created successfully!');
        $this->closeModal();
        $this->load();
    }


    public function render()
    {
        $this->load();
        return view('livewire.admin.table-crud')
            ->extends('layouts.admin');
    }


    public function delete($id)
    {
        Table::find($id)->delete();
        session()->flash('message', 'Table deleted successfully!');
        $this->load();
    }

    public function resetFields()
    {
        $this->name = '';
        $this->guest_number = '';
        $this->status = '';
        $this->tableId = null;
    }

    public function changeStatus($id, $status)
    {
        $table = Table::find($id);
        $table->update([
            'status' => $status
        ]);
        session()->flash('message', 'Table status is updated');
    }
}
