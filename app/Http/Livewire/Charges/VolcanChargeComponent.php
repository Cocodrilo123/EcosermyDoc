<?php

namespace App\Http\Livewire\Charges;

use Livewire\Component;
use App\Models\volcanCharge ;
use Doctrine\Inflector\Rules\English\Rules;
use Illuminate\Contracts\Pagination\Paginator;
use Livewire\WithPagination;

class VolcanChargeComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $isOpen,$isOpenDelete = 0;
    public $name, $description, $charge_id;
    public $search = '';
    protected $queryString = ['search'];
    protected $rules = [
        'name'=>'required|max:100|unique:ecosermy_charges',
        'description'=>'required',
    ];
    public function render()
    {
        $volcanCharges = volcanCharge::where('name', 'like', '%'.$this->search.'%')->orderBy('id','desc')->paginate(7);
        return view('livewire.charges.volcan-charge-component', compact('volcanCharges'));
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
        $this->charge_id='';
        $this->name = '';
        $this->description = '';
    }
    public function store()
    {
        $this->validate();
        volcanCharge::updateOrCreate(['id' => $this->charge_id], [
            'name' => $this->name,
            'description' => $this->description
        ]);
        session()->flash('message',
        $this->charge_id ? 'Accion exitosa' : 'Elemento creado');
        $this->closeModal();
        $this->resetInputFields();
    }
    public function edit($id)
    {
        $volcanCharges = volcanCharge::findOrFail($id);
        $this->charge_id = $id;
        $this->name = $volcanCharges->name;
        $this->description = $volcanCharges->description;
        $this->openModal();
    }
    public function deleteModal($id)
    {
        $this->openModalDelete($id);
    }
    public function openModalDelete($id)
    {
        $charge_id = volcanCharge::findOrFail($id);
        $this->charge_id = $id;
        $this->name = $charge_id->name;
        $this->isOpenDelete = true;
    }
    public function closeModalDelete()
    {
        $this->isOpenDelete = false;
    }
    public function delete()
    {
        volcanCharge::find($this->charge_id)->delete();
        session()->flash('message',
        $this->id ? 'Elemento Eliminado' : '');
        $this->closeModalDelete();
    }
}
