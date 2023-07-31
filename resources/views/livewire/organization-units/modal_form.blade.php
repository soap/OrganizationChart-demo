<div class="modal fade" wire:ignore.self id="modalForm" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Add Product</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    @csrf
                    <div class="mb-3">
                        <label for="parent_id" class="form-label bold">Parent Unit:</label>
                        <div>
                            <span class="">{{ $orgUnit->name }} ({{ $orgUnit->short_name }}) </span>
                        </div>
                        <input wire:model="parent_id" type="hidden" name="parent_id" value="{{ $orgUnit->id }}"
                            class="form-control">
                        @if($unit_id) 
                            <input wire:model="unit_id" type="hidden" name="unit_id" value="{{ $unit_id }}"
                                class="form-control">
                        @endif
                        <input wire:model="is_company" type="hidden" name="is_company" value={{ $is_company }} class="form-control">    
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input wire:model="name" type="text" name="name" class="form-control" id="name"
                            placeholder="Name" value="{{ $name }}">
                        @error('name')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="short_name" class="form-label">Short Name</label>
                        <input wire:model="short_name" type="text" name="short_name" class="form-control"
                            id="short_name" placeholder="Short Name" value="{{ $short_name }}">
                        @error('short_name')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button wire:click.prevent="save()" type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
