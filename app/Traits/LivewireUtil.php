<?php

namespace App\Traits;

use Livewire\WithPagination;

trait LivewireUtil
{
    use WithPagination;
    public $modal_open = false, $fills = [], $rules = [], $Model, $search, $delete_modal = false, $is_using_modal = false;
    public $model_id, $modal_title="Delete Item", $modal_item = 'item', $is_using_data_table = true;

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
        $this->validate($this->rules);

        $data = [];

        foreach ($this->fills as $key) {
            $data["{$key}"] = $this->{$key};
        }

        $this->Model->updateOrCreate(['id' => $this->model_id], $data);

        session()->flash('message', $this->model_id ? 'Update Successful' : 'Record Created Successfully.');

        $this->reset($this->fills);

        if ($this->is_using_modal) {
            $this->closeModal();
        }

        if ($this->is_using_data_table) {
            $this->emit('refreshLivewireDatatable');
        }

    }

    private function generateSlug($value) {
        return strtolower(str_replace(' ', '-', $value));
    }
}
