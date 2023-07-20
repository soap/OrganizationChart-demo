<div class="container">
    <div class="row">
        <div class="col-md-12">

            <div class="input-group">
                <div class="input-group-prepend">
                    <button class="btn btn-primary" type="button" >Add Employee</button>
                </div>
                <input type="text" class="form-control" placeholder="Search" wire:model="searchTerm" />
            </div>
 
            <table class="table table-bordered" style="margin: 10px 0 10px 0;">
                <tr>
                    <th>ID</th>
                    <th>Employee</th>
                    <th>Status</th>
                    <th>Job Position</th>
                </tr>
                @foreach($employees as $employee)
                <tr>
                    <th>{{$employee->id}}</th>
                    <th>{{$employee->first_name}}   {{$employee->last_name}}</th>
                    <th>{{$employee->status}}</th>
                    <th>{{$employee->jobPosition->name}}</th>
                </tr>
                @endforeach
            </table>
            {!!$employees->links('pagination::bootstrap-5')!!}
        </div>
    </div>
</div>