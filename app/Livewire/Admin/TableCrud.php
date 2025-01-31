<?php

namespace App\Livewire\Admin;

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

    #[Validate('required')]
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
        $this->isOpen =  true;
    }


    public function closeModal()
    {
        $this->isOpen = false;
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
        $this->validate();

        Table::query()->updateOrCreate(['id' => $this->tableId], [
            'name' => $this->name,
            'guest_number' => $this->guest_number,
            'status' => $this->status,
        ]);

        session()->flash('maessage', $this->tableId ? 'Table updated successfully!' : 'Table created successfully!');
        $this->closeModal();
        $this->resetFields();
    }


    // Отображение страницы с таблицами
    public function render()
    {
        $this->load();
        return view('livewire.admin.table-crud')
            ->extends('layouts.admin');
    }


    // Удаление таблицы
    public function delete($id)
    {
        Table::find($id)->delete();
        session()->flash('message', 'Table deleted successfully!');
        $this->load();
    }

    // Сброс значений в форму
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
