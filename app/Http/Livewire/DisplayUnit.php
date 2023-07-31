<?php

namespace App\Http\Livewire;

use App\Models\OrganizationUnit;
use Livewire\Component;
use Illuminate\Support\Str;

class DisplayUnit extends Component
{
    public $orgUnit;  // current unit is parent unit

    public $children; // children of current unit

    public $unit_id, $name, $short_name, $is_company = 0;

    public $isOpened = false; // modal is opened or not

    public $listeners = ['orgUnitChanged' => 'navigateTo'];

    public function mount($orgUnit)
    {
        if ($orgUnit == null) {
            $orgUnit = OrganizationUnit::root()->first();
        }
        
        $this->orgUnit = $orgUnit;
        $this->children = $orgUnit->children()->get();
    }

    /**
     * This action to change unit is from self so notify other
     * @param mixed $unitId 
     * @return void 
     */
    public function navigateTo($unitId)
    {        
        $this->orgUnit = OrganizationUnit::find($unitId);
        $this->children = $this->orgUnit->children()->get();
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function edit($id)
    {
        $organizationUnit = OrganizationUnit::findOrFail($id);
        $this->unit_id = $id;
        $this->name = $organizationUnit->name;
        $this->short_name = $organizationUnit->short_name;
        $this->is_company = $organizationUnit->is_company;
        $this->openModal();
    }

    public function save()
    {
        if ($this->unit_id) {
            $this->update();
        }else{
            $this->store();
        }
        $this->navigateTo($this->orgUnit->id);
    }

    protected function store()
    {
        $validated = $this->validate([
            'name' => 'required|min:5|unique:organization_units',
            'short_name' => 'required|min:3|unique:organization_units',
            'is_company' => 'required|boolean'
        ]);

        OrganizationUnit::create([
            'name' => $validated['name'],
            'short_name' => $validated['short_name'],
            'is_company' => $this->is_company,
        ], $this->orgUnit);

        session()->flash('message', 'OrganizationUnit created successfully.');

        $this->resetInputFields();
        $this->closeModal();
    }

    protected function update()
    {
        $validated = $this->validate([
            'name' => 'required|min:5|unique:organization_units,name,'.$this->unit_id,
            'short_name' => 'required|min:3|unique:organization_units,short_name,'.$this->unit_id,
            'is_company' => 'required|boolean'
        ]);

        $orgUnit = OrganizationUnit::findOrFail($this->unit_id);
        $orgUnit->update([
            'name' => $validated['name'],
            'short_name' => Str::upper($validated['short_name']),
            'is_company' => $validated['is_company'] ,
        ]);

        $this->resetInputFields();
        $this->closeModal();
    }

    public function destroy($id)
    {
        if ($id) {
            $organizationUnit = OrganizationUnit::findOrFail($id);
            if ($organizationUnit->employees->count()) {
                session()->flash('warning', 'OrganizationUnit has employees, can not be deleted.');
                
            }else{
                $organizationUnit->delete();
                session()->flash('message', 'OrganizationUnit deleted successfully.');
            }
        }
    }
    
    public function render()
    {
        return view('livewire.organization-units.display-unit');
    }

    public function openModal()
    {
        $this->isOpened = true;
        $this->dispatchBrowserEvent('openModal');
    }

    public function closeModal()
    {
        $this->isOpened = false;
        $this->dispatchBrowserEvent('closeModal');
    }

    private function resetInputFields()
    {
        $this->unit_id = null;
        $this->name = '';
        $this->short_name = '';
    }

}
