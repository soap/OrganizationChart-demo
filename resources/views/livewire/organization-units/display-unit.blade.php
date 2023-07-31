<div class="container-fluid-">
    <div class="ms-auto">
        <button wire:click="create()" class="btn btn-primary mb-3 ">Add Child Unit</button>
    </div>
    <div>
    @if (session()->has('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ session('warning') }}
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if (session()->has('message'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    </div>                         
    @foreach ($orgUnit->children()->get() as $unit)
        <div class="row">
            <div class="col-md-8 mb-2"> <a href="#" wire:click="$emit('orgUnitChanged', {{ $unit->id }})"> {{ $unit->name }} </a></div>
            <div class="col-md-2 mb-2"> {{ $unit->short_name }} </div>
            <div class="col-md-2 mb-2">@include('livewire.organization-units.buttons')</div>
        </div>
    @endforeach     
    
    @include('livewire.organization-units.modal_form')

</div>
@push('scripts')
    <script type="module">
        const modalForm = new bootstrap.Modal(document.getElementById('modalForm'), {
            keyboard: false
        });

        window.addEventListener('closeModal', event => {
            modalForm.hide();
        });
        window.addEventListener('openModal', event => {
            modalForm.show();
        });
    </script>
@endpush
