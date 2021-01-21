<?php

namespace App\Http\Livewire\Partners;

use Livewire\Component;
use App\Models\census;
use App\Models\partner;
use App\Models\kin;
use Doctrine\Inflector\Rules\English\Rules;
use Illuminate\Contracts\Pagination\Paginator;
use Livewire\WithPagination;

class CensusComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $isOpen, $isOpenDelete = 0;
    public $name, $last_name, $DNI, $partner_id, $kin_id, $census_id;
    public $search = '';
    public $searchPartner = '';
    protected $rules = [
        'name'=>'required|max:60',
        'last_name'=>'required|max:60',
        'DNI'=>'required|max:99999999|min:10000000|numeric',
        'partner_id'=>'required',
        'kin_id'=>'required'
    ];
    public function render()
    {
        $censuses = census::where('last_name', 'like', '%'.$this->search.'%')->orderBy('last_name','asc')->paginate(8);
        $partners = partner::where('last_name', 'like', '%'.$this->searchPartner.'%')->orderBy('last_name','asc')->get(); 
        $kins = kin::select('id', 'name')->orderBy('name','asc')->get();
        return view('livewire.partners.census-component', compact('censuses','partners','kins'));
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
        $this->census_id ='';
        $this->name = '';
        $this->last_name = '';
        $this->DNI = '';
        $this->partner_id='';
        $this->kin_id='';
        $this->searchPartner='';

    }

    public function store()
    {
        $this->validate();
        census::updateOrCreate(['id' => $this->census_id], [
            'name' => $this->name,
            'last_name' => $this->last_name,
            'DNI' => $this->DNI,
            'partner_id'=>$this->partner_id,
            'kin_id'=>$this->kin_id,
        ]);
        session()->flash('message',
        $this->census_id ? 'Accion exitosa' : 'Elemento creado');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $censuses = census::findOrFail($id);
        $this->census_id = $id;
        $this->name = $censuses->name;
        $this->last_name = $censuses->last_name;
        $this->DNI = $censuses->DNI;
        $this->partner_id = $censuses->partner_id;
        $this->kin_id = $censuses->kin_id;
        $this->openModal();
    }
    public function openModalDelete($id)
    {
        $censuses = census::findOrFail($id);
        $this->census_id = $id;
        $this->last_name = $censuses->last_name." ".$censuses->name;
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
        census::find($this->census_id)->delete();
        session()->flash('message', 
        $this->id ? 'Elemento Eliminado' : '');
        $this->closeModalDelete();
    }
}
