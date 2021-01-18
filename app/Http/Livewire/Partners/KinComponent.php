<?php

namespace App\Http\Livewire\Partners;

use Livewire\Component;
use App\Models\kin;
use Doctrine\Inflector\Rules\English\Rules;
use Illuminate\Contracts\Pagination\Paginator;
use Livewire\WithPagination;

class KinComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $isOpen,$isOpenDelete = 0;
    public $name, $description, $kin_id;
    public $search = '';
    protected $queryString = ['search'];
    protected $rules = [
        'name'=>'required|max:40|unique:kin',
    ];
    public function render()
    {
        $kins = kin::where('name', 'like', '%'.$this->search.'%')->orderBy('id','desc')->paginate(7);
        return view('livewire.partners.kin-component', compact('kins'));
    }
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }
    private function resetInputFields(){
        $this->kin_id='';
        $this->name = '';
        $this->description = '';
    }
    public function store()
    {
        $this->validate();
        kin::updateOrCreate(['id' => $this->kin_id], [
            'name' => $this->name,
            'description' => $this->description
        ]);
        session()->flash('message',
        $this->kin_id ? 'Accion exitosa' : 'Elemento creado');
        $this->closeModal();
        $this->resetInputFields();
    }
    public function edit($id)
    {
        $kins = kin::findOrFail($id);
        $this->kin_id = $id;
        $this->name = $kins->name;
        $this->description = $kins->description;
        $this->openModal();
    }
    public function deleteModal($id)
    {
        $this->openModalDelete($id);
    }
    public function openModalDelete($id)
    {
        $kins = kin::findOrFail($id);
        $this->kin_id = $id;
        $this->name = $kins->name;
        $this->isOpenDelete = true;
    }
    public function closeModalDelete()
    {
        $this->isOpenDelete = false;
    }
    public function delete()
    {
        kin::find($this->kin_id)->delete();
        session()->flash('message',
        $this->id ? 'Elemento Eliminado' : '');
        $this->closeModalDelete();
    }
}
