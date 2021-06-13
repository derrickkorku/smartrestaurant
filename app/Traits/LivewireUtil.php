<?php

namespace App\Traits;

use Livewire\WithPagination;

trait LivewireUtil
{
    use WithPagination;
    public $modal_open = false, $fills = [], $Model, $search, $delete_modal = false;
    public $model_id, $modal_title="Delete Item", $modal_item = 'item';

    public function openModal()
    {
        $this->modal_open = true;
    }

    public function closeModal()
    {
        $this->modal_open = false;
        $this->model_id = null;
    }

    public function closeDeleteModal() {
        $this->delete_modal = false;
        $this->model_id = null;
    }

    private function resetInputFields()
    {
        $this->reset($this->fills);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function confirmDelete($id){
        $this->model_id = $id;
        $this->delete_modal = true;
    }

    public function delete()
    {
        if ($this->model_id) {
            $this->Model->find($this->model_id)->delete();
            $this->emitTo('shared.flash-message', 'message', 'success', 'Delete Successful');
            $this->delete_modal = false;
            $this->model_id = null;
        }
    }

    public function deleteChecked()
    {
        $this->Model->whereIn('id', $this->checkbox_values)->delete();
        $this->emitTo('shared.flash-message', 'message', 'success', 'Delete Successful');
    }

    public function edit($id)
    {
        $model = $this->Model->find($id);
        $this->fills = $model->fillable;

        foreach($model->fillable as $key) {
            $this->{$key} = $model->{$key};
        }

        $this->model_id = $id;

        $this->openModal();
    }

    public function store()
    {
        $this->validate();

        $data = [];

        foreach ($this->fills as $key) {
            $data["{$key}"] = $this->{$key};
        }

        $this->Model->updateOrCreate(['id' => $this->model_id], $data);
        $this->emitTo('shared.flash-message', 'message', 'success', $this->model_id ? 'Update Successful' : 'Record Created Successfully.');

        $this->emit('refreshLivewireDatatable');

        $this->resetInputFields();
        $this->closeModal();
    }

    private function generateSlug($value) {
        return strtolower(str_replace(' ', '-', $value));
    }
}
