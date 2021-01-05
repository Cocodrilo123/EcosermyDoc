<?php

namespace App\Http\Livewire\AreasProjects;

use Livewire\Component;
use App\Models\area;
use Doctrine\Inflector\Rules\English\Rules;
use Illuminate\Contracts\Pagination\Paginator;
use Livewire\WithPagination;
class AreaComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $isOpen,$isOpenDelete = 0;
    public $name, $description, $area_id;
    public $search = '';
    protected $queryString = ['search'];
    protected $rules = [
        'name'=>'required|max:100|unique:areas',
        'description'=>'required',
    ];
    public function render()
    {
        $areas = area::where('name', 'like', '%'.$this->search.'%')->orderBy('id','desc')->paginate(7);
        return view('livewire.areas-projects.area-component', compact('areas'));
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
        $this->area_id='';
        $this->name = '';
        $this->description = '';
    }
    public function store()
    {
        $this->validate();
        area::updateOrCreate(['id' => $this->area_id], [
            'name' => $this->name,
            'description' => $this->description
        ]);
        session()->flash('message',
        $this->area_id ? 'Accion exitosa' : 'Elemento creado');
        $this->closeModal();
        $this->resetInputFields();
    }
    public function edit($id)
    {
        $areas = area::findOrFail($id);
        $this->area_id = $id;
        $this->name = $areas->name;
        $this->description = $areas->description;
        $this->openModal();
    }
    public function deleteModal($id)
    {
        $this->openModalDelete($id);
    }
    public function openModalDelete($id)
    {
        $areas = area::findOrFail($id);
        $this->area_id = $id;
        $this->name = $areas->name;
        $this->isOpenDelete = true;
    }
    public function closeModalDelete()
    {
        $this->isOpenDelete = false;
    }
    public function delete()
    {
        area::find($this->area_id)->delete();
        session()->flash('message',
        $this->id ? 'Elemento Eliminado' : '');
        $this->closeModalDelete();
    }
}