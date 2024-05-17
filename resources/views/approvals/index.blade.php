@extends('layouts.admin')

@section('main-content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Vehicles') }}</h1>

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
                <div class="row justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Vehicles Data</h6>
                    @can('admin')
                    <a class="btn btn-smm btn-success" href="{{ route('vehicles.export') }}"><i class="fa fa-check"></i>
                        Export Data All Approval User</a>
                    @endcan
                </div>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        <thead>
                            <tr>
                                <th>Name Pegawai</th>
                                <th>Superior Acc</th>
                                <th>Vehicle</th>
                                <th>Vehicle Type</th>
                                <th>Vehicle Brand</th>
                                <th>BBM Vehicle</th>
                                <th>Vehicle Licence Plate</th>
                                <th>Start Date Borrow</th>
                                <th>End Date Borrow</th>
                                <th>Notes Approval User</th>
                                <th>Status</th>
                                <th>Entry Approval</th>
                            </tr>
                        </thead>
                        <tbody>
                            @can('admin')
                            @foreach($datasetApproval as $data)
                            <tr>

                                <td>{{ $data->karyawan->name }}</td>
                                <td>{{ $data->superior ? $data->superior->name : "not yet assign" }}</td>
                                <td>{{ $data->vehicle->vehicleName->name_vehicle }}</td>
                                <td>{{ $data->vehicle->vehicleName->type_vehicle }}</td>
                                <td>{{ $data->vehicle->vehicleName->brand_vehicle }}</td>
                                <td>{{ $data->vehicle->vehicleName->bbm_vehicle }}</td>
                                <td>{{ $data->vehicle->license_plate }}</td>
                                <td>{{ $data->start_date }}</td>
                                <td>{{ $data->end_date }}</td>
                                <td>{{ $data->notes }}</td>
                                <td>
                                    @if($data->status == "approved")
                                    <span class="badge badge-success">Approved</span>
                                    @elseif($data->status == "rejected")
                                    <span class="badge badge-danger">Reject</span>
                                    @elseif($data->status == "pending")
                                    <span class="badge badge-warning">Pending</span>
                                    @elseif($data->status == "done_borrow")
                                    <span class="badge badge-primary">Already Done</span>
                                    @endif
                                </td>
                                <td>

                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#approvalModal{{ $data->id }}">
                                        <i class="fa fa-history"></i>
                                    </button>


                                    <!-- Modal -->
                                    <div class="modal fade" id="approvalModal{{ $data->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="approvalModalLabel{{ $data->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="approvalModalLabel{{ $data->id }}">
                                                        Update Approval</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('approval.update', $data->id) }}"
                                                        method="POST">
                                                        @method('PATCH')
                                                        @csrf

                                                        <label for="status">Status</label>
                                                        <select name="status" id="status" class="form-control">
                                                            <option value="" selected disabled>-- select status --
                                                            </option>
                                                            <option value="done_borrow">Already Done</option>
                                                        </select>


                                                        <div class="form-group">
                                                            <label for="superior_acc">Superior Acc</label>

                                                            <select name="superior_id" id="superior_acc"
                                                                class="form-control">
                                                                <option value="" selected disabled>-- select superior
                                                                    acc --</option>
                                                                @foreach($superiors as $superior)
                                                                <option value="{{ $superior->id }}">{{ $superior->name
                                                                    }}</option>
                                                                @endforeach
                                                            </select>
                                                            <label for="driver_assign">Driver Assign</label>
                                                            <select name="driver_id" id="driver_assign"
                                                                class="form-control">
                                                                <option value="" selected disabled>-- select driver --
                                                                </option>
                                                                @foreach($drivers as $driver)
                                                                <option value="{{ $driver->id }}">{{
                                                                    $driver->name_driver
                                                                    }}</option>
                                                                @endforeach
                                                            </select>


                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit"
                                                                class="btn btn-primary">Submit</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endcan

                            @can('superior')

                            @foreach($datasetApprovalSuperior as $data)
                            <tr>

                                <td>{{ $data->karyawan->name }}</td>
                                <td>{{ $data->superior ? $data->superior->name : "not yet assign" }}</td>
                                <td>{{ $data->vehicle->vehicleName->name_vehicle }}</td>
                                <td>{{ $data->vehicle->vehicleName->type_vehicle }}</td>
                                <td>{{ $data->vehicle->vehicleName->brand_vehicle }}</td>
                                <td>{{ $data->vehicle->vehicleName->bbm_vehicle }}</td>
                                <td>{{ $data->vehicle->license_plate }}</td>
                                <td>{{ $data->start_date }}</td>
                                <td>{{ $data->end_date }}</td>
                                <td>{{ $data->notes }}</td>
                                <td>
                                    @if($data->status == "approved")
                                    <span class="badge badge-success">Approved</span>
                                    @elseif($data->status == "rejected")
                                    <span class="badge badge-danger">Reject</span>
                                    @elseif($data->status == "pending")
                                    <span class="badge badge-warning">Pending</span>
                                    @elseif($data->status == "done_borrow")
                                    <span class="badge badge-primary">Already Done</span>
                                    @endif
                                </td>

                                <td>

                                    <form action="{{ route('superior.update', $data->id) }}" method="post">
                                        @csrf
                                        @method('patch')
                                        <input type="hidden" value="{{ $data->vehicle_id }}" name="status_vehicle">

                                        <select name="status" id="status" class="form-control">
                                            <option value="" selected disabled>-- select status --
                                            </option>
                                            <option value="approved">Approved</option>
                                            <option value="rejected">Reject</option>
                                        </select>

                                        <button type="submit" class="btn btn-success btn-sm"><i
                                                class="fa fa-check"></i>submit</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            @endcan

                            @can('pegawai')

                            @foreach($datasetApprovalPegawai as $data)

                            <tr>

                                <td>{{ $data->karyawan->name }}</td>
                                <td>{{ $data->superior ? $data->superior->name : "not yet assign" }}</td>
                                <td>{{ $data->vehicle->vehicleName->name_vehicle }}</td>
                                <td>{{ $data->vehicle->vehicleName->type_vehicle }}</td>
                                <td>{{ $data->vehicle->vehicleName->brand_vehicle }}</td>
                                <td>{{ $data->vehicle->vehicleName->bbm_vehicle }}</td>
                                <td>{{ $data->vehicle->license_plate }}</td>
                                <td>{{ $data->start_date }}</td>
                                <td>{{ $data->end_date }}</td>
                                <td>{{ $data->notes }}</td>
                                <td>
                                    @if($data->status == "approved")
                                    <span class="badge badge-success">Approved</span>
                                    @elseif($data->status == "rejected")
                                    <span class="badge badge-danger">Reject</span>
                                    @elseif($data->status == "pending")
                                    <span class="badge badge-warning">Pending</span>
                                    @elseif($data->status == "done_borrow")
                                    <span class="badge badge-primary">Already Done</span>
                                    @endif
                                </td>
                                <td> - </td>
                            </tr>
                            @endforeach
                            @endcan




                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection