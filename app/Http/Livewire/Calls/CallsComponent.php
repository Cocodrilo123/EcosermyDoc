<?php

namespace App\Http\Livewire\Calls;

use Livewire\Component;
use App\Models\call;
use App\Models\ecosermyCharge;
use App\Models\area;
use Doctrine\Inflector\Rules\English\Rules;
use Illuminate\Contracts\Pagination\Paginator;
use Livewire\WithPagination;

class CallsComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $isOpen, $isOpenDelete = 0;
    public $name, $description, $ecosermy_charge_id, $area_id, $status, $call_id;
    public $search = '';
    protected $rules = [
        'name'=>'required|max:100',
        'description'=>'required|max:100',
        'ecosermy_charge_id'=>'required',
        'area_id'=>'required',
        'status'=>'required|max:8'
    ];
    public function render()
    {
        $calls = call::where('name', 'like', '%'.$this->search.'%')->orderBy('id','desc')->paginate(8);
        $ecosermy_charges = ecosermyCharge::select('id', 'name')->orderBy('name','asc')->get();
        $areas = area::select('id', 'name')->orderBy('name','asc')->get();
        return view('livewire.calls.calls-component', compact('calls','ecosermy_charges','areas'));
    }
    public function create()
    {
        $this->openModal();
        $this->resetInputFields();
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
        $this->call_id ='';
        $this->name = '';
        $this->description = '';
        $this->ecosermy_charge_id = '';
        $this->area_id='';
        $this->status='';
    }
    public function store()
    {
        $this->validate();
        call::updateOrCreate(['id' => $this->call_id], [
            'name' => $this->name,
            'description' => $this->description,
            'ecosermy_charge_id'=>$this->ecosermy_charge_id,
            'area_id'=>$this->area_id,
            'status'=>$this->status
        ]);
        session()->flash('message', 
        $this->call_id? 'Accion exitosa' : 'Elemento creado');
        $this->closeModal();
        $this->resetInputFields();
    }
    public function edit($id)
    {
        $calls = call::findOrFail($id);
        $this->call_id = $id;
        $this->name = $calls->name;
        $this->description = $calls->description;
        $this->ecosermy_charge_id = $calls->ecosermy_charge_id;
        $this->area_id = $calls->area_id;
        $this->status = $calls->status;
        $this->openModal();
    }
    public function openModalDelete($id)
    {
        $calls = call::findOrFail($id);
        $this->call_id = $id;
        $this->name = $calls->name;
        $this->isOpenDelete = true;
    }

    public function closeModalDelete()
    {
        $this->isOpenDelete = false;
    }

    public function deleteModal($id)
    {
        $this->openModalDelete($id);
    }
    public function delete()
    {
        call::find($this->call_id)->delete();
        session()->flash('message',
        $this->id ? 'Elemento Eliminado' : '');
        $this->closeModalDelete();
    }
}
