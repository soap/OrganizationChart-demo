<?php // routes/breadcrumbs.php

// Note: Laravel will automatically resolve `Breadcrumbs::` without
// this import. This is nice for IDE syntax and refactoring.
use Diglactic\Breadcrumbs\Breadcrumbs;

// This import is also not required, and you could replace `BreadcrumbTrail $trail`
//  with `$trail`. This is nice for IDE type checking and completion.
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

use App\Models\OrganizationUnit;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

// Home > Organization
Breadcrumbs::for('organization', function (BreadcrumbTrail $trail, $orgUnit = null) {
    $organizationUnit = OrganizationUnit::whereNull('parent_id')->first();
    $trail->parent('home');
    $trail->push($organizationUnit->name, route('unit.show', ['orgUnit' => $organizationUnit->id]));
});

// Home > Organization > [Department]
Breadcrumbs::for('department', function (BreadcrumbTrail $trail, $department) {
    $trail->parent('organization');
    $trail->push($department->name, route('unit.show', ['orgUnit' => $department->id]));
});

// Home > Organization > [Department] > [Section]
Breadcrumbs::for('section', function (BreadcrumbTrail $trail, $section) {
    $department = OrganizationUnit::where('id', $section->parent_id)->first();
    $trail->parent('department', $department);
    $trail->push($section->name, route('unit.show', ['orgUnit' => $section->id]));
});

// Home > Organization > [Department] > [Section] > [Division]
Breadcrumbs::for('division', function (BreadcrumbTrail $trail, $division) {
    $section = OrganizationUnit::where('id', $division->parent_id)->first();
    $trail->parent('section', $section);
    $trail->push($division->name, route('unit.show', ['orgUnit' => $division->id]));
});