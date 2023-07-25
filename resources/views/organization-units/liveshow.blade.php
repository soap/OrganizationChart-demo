@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        @livewire('unit-breadcrumbs', ['orgUnit' => $orgUnit])
                        <button type="button" class="btn btn-primary" 
                            data-bs-toggle="modal" 
                            data-bs-url="{{ route('organization-unit.add-child', $orgUnit->id) }}"
                            data-bs-header="Add Child Unit"
                            data-bs-target="#largeModal">
                        +
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                    @livewire('display-unit', ['orgUnit' => $orgUnit])
                    </div>
                    <div>
                    @livewire('organization-employees', ['orgUnit' => $orgUnit])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
    Livewire.on('orgUnitChanged', unitId => {
        alert('Unit change to the id of: ' + unitId);
        
    })
    </script>
@endpush
@endsection