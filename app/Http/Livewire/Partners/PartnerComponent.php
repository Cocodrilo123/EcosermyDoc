<?php

namespace App\Http\Livewire\Partners;

use Livewire\Component;
use App\Models\partner;
use Doctrine\Inflector\Rules\English\Rules;
use Illuminate\Contracts\Pagination\Paginator;
use Livewire\WithPagination;

class PartnerComponent extends Component
{
    use WithPagination;
    protected $paginationTheme = 'tailwind';
    public $isOpen,$isOpenDelete = 0;
    public $name, $last_name, $DNI, $partner_id;
    public $search = '';
    protected $queryString = ['search'];
    protected $rules = [
        'name'=>'required|max:40',
        'last_name'=>'required|max:40',
        'DNI'=>'required|max:99999999|min:10000000|numeric|unique:partners',
    ];
    public function render()
    {
        $partners = partner::where('last_name', 'like', '%'.$this->search.'%')->orderBy('last_name','asc')->paginate(10);
        return view('livewire.partners.partner-component', compact('partners'));
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
        $this->partner_id = '';
        $this->name = '';
        $this->last_name = '';
        $this->DNI = '';
    }

    public function store()
    {
        $this->validate();
        partner::updateOrCreate(['id' => $this->partner_id], [
            'name' => $this->name,
            'last_name' => $this->last_name,
            'DNI' => $this->DNI
        ]);
        session()->flash('message', 
        $this->partner_id ? 'Accion exitosa' : 'Elemento creado');
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $partners = partner::findOrFail($id);
        $this->partner_id = $id;
        $this->name = $partners->name;
        $this->last_name = $partners->last_name;
        $this->DNI = $partners->DNI;
        $this->openModal();
    }

    public function openModalDelete($id)
    {
        $partners = partner::findOrFail($id);
        $this->partner_id = $id;
        $this->last_name = $partners->last_name;
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
        partner::find($this->partner_id)->delete();
        session()->flash('message', 
        $this->id ? 'Elemento Eliminado' : '');
        $this->closeModalDelete();
    }
}
