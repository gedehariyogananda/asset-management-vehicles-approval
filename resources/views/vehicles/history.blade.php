@extends('layouts.admin')

@section('main-content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('History Vehicles') }}</h1>

@if (session('success'))
<div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger border-left-danger" role="alert">
    <ul class="pl-4 my-2">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="row">

    <div class="col-lg-12 order-lg-1">

        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">History Vehicles Data</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Name Karyawan</th>
                                <th>Superior Acc</th>
                                <th>Start Date Borrow</th>
                                <th>End Date Borrow</th>
                                <th>Notes</th>
                                <th>Driver Accept</th>
                                <th>Status Borrow</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($userVehicles as $data)
                                <td>{{ $data->karyawan->name }}</td>
                                <td>{{ $data->superior->name }}</td>
                                <td>{{ $data->start_date }}</td>
                                <td>{{ $data->end_date }}</td>
                                <td>{{ $data->notes }}</td>
                                <td>{{ $data->driver->name_driver}}</td>
                                <td>
                                    @if($data->status == "approved")
                                    <span class="badge badge-success">Approved</span>
                                    @else
                                    <span class="badge badge-warning">Already Done</span>
                                    @endif
                                </td>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection