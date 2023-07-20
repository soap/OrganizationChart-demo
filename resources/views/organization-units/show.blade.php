@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><x-unit-navigation-bs5 :breadcrumbs="$breadcrumbs" /></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div>
                        <div>
                            <table class="table">
                                @foreach ($children as $unit)
                                <tr>
                                    <td> <a href={{ route('unit.show', $unit->id)}} >{{ $unit->name }} </a></td>
                                    <td> {{ $unit->short_name }} </td>
                                </tr>
                                @endforeach
                                @foreach($orgUnit->employees as $employee)
                                <tr>
                                    <td>{{ $employee->first_name }} {{ $employee->last_name }} ({{ $employee->jobPosition->name }})</td>
                                    <td>{{ $jobRoles[$employee->pivot->job_role_id] }}</td>
                                </tr>
                                @endforeach                                 
                            </table>
                        </div>
                        <div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection