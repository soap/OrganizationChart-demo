<?php

namespace App\Http\Livewire;

use Livewire\Component;

class OrganizationUnit extends Component
{
    public $parent_id = 0;
    public $name;
    public $short_name;
    public $is_comany = 0;
    public $updateMode = false;
    
    protected $rules = [
        'name' => 'required|min:5|unique:organization_units',
        'short_name' => 'required|min:3|unique:organization_units',
    ];

    public function edit($id)
    {

    }

    public function store()
    {

    }

    public function update()
    {

    }

    public function destroy($id)
    {
        if ($id) {
            $organizationUnit = OrganizationUnit::findOrFail($id);
            if ($organizationUnit->employees->count()) {
                session()->flash('message', 'OrganizationUnit has employees, can not be deleted.');
                
            }else{
                $organizationUnit->delete();
                session()->flash('message', 'OrganizationUnit deleted successfully.');
            }
        }
    }

    public function render()
    {
        return view('livewire.organization-units.form');
    }

}
