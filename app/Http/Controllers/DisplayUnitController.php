<?php

namespace App\Http\Controllers;

use App\Models\OrganizationUnit;
use Illuminate\Http\Request;

class DisplayUnitController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, OrganizationUnit $orgUnit = null)
    {
        if (is_null($orgUnit)) {
            $orgUnit = OrganizationUnit::root()->first();
        }
        $children = $orgUnit->children()->get();
        $breadcrumbs = $orgUnit->getNavigationLinks();
        return view(
            'organization-units.show',
            compact('orgUnit', 'children', 'breadcrumbs')
        );
    }
}
