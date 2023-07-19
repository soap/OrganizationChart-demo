<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class OrganizationUnit extends Model
{
    use HasFactory, NodeTrait;
    
    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_has_organization_units', 'organization_unit_id', 'employee_id');
    }

    public function getNavigationLinks()
    {
        $nodes = Self::ancestorsAndSelf($this->id);
        $links = collect($nodes)->map(function($node) {
            $obj = new \stdClass();
            $obj->title = $node->name;
            $obj->url = route('unit.show', $node->id);
            return $obj;
        });

        return $links;
    }
}
