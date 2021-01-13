<?php

namespace App\Http\Livewire\AreasProjects;

use Livewire\Component;
use App\Models\project;
use Doctrine\Inflector\Rules\English\Rules;
use Illuminate\Contracts\Pagination\Paginator;
use Livewire\WithPagination;

class ProjectComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $isOpen,$isOpenDelete = 0;
    public $name, $description, $project_id;
    public $search = '';
    protected $queryString = ['search'];
    protected $rules = [
        'name'=>'required|max:100|unique:projects',
        'description'=>'required',
    ];
    public function render()
    {
        $projects = project::where('name', 'like', '%'.$this->search.'%')->orderBy('id','desc')->paginate(7);
        return view('livewire.areas-projects.project-component', compact('projects'));
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
        $this->project_id='';
        $this->name = '';
        $this->description = '';
    }
    public function store()
    {
        $this->validate();
        project::updateOrCreate(['id' => $this->project_id], [
            'name' => $this->name,
            'description' => $this->description
        ]);
        session()->flash('message',
        $this->project_id ? 'Accion exitosa' : 'Elemento creado');
        $this->closeModal();
        $this->resetInputFields();
    }
    public function edit($id)
    {
        $projects = project::findOrFail($id);
        $this->project_id = $id;
        $this->name = $projects->name;
        $this->description = $projects->description;
        $this->openModal();
    }
    public function deleteModal($id)
    {
        $this->openModalDelete($id);
    }
    public function openModalDelete($id)
    {
        $projects = project::findOrFail($id);
        $this->project_id = $id;
        $this->name = $projects->name;
        $this->isOpenDelete = true;
    }
    public function closeModalDelete()
    {
        $this->isOpenDelete = false;
    }
    public function delete()
    {
        project::find($this->project_id)->delete();
        session()->flash('message',
        $this->id ? 'Elemento Eliminado' : '');
        $this->closeModalDelete();
    }
}
