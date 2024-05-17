@extends('layouts.admin')
@section('title', 'Page All Vehicle Init')

@section('main-content')

<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">{{ __('Data Vehicles') }}</h1>


<div class="row">

    <div class="col-lg-12 order-lg-1">

        <div class="card shadow mb-4">

            <div class="card-header py-3">
                <div class="row justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Vehicles Data</h6>
                    @can('admin')
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#createModal">
                        <i class="fa fa-plus"></i> Add Vehicles Data 
                    </button>
                    @endcan
                    <!-- Create Modal -->

                    <div class="modal fade" id="createModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add Vehicle</h5>
                                    <button type="button" class="close" data-dismiss="modal">
                                        <span>&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('vehicles.storeVehicle') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label for="license_plate">License Plate</label>
                                            <input type="text" class="form-control" id="license_plate"
                                                name="license_plate" required>
                                        </div>
                                        <input type="hidden" name="vehicle_name_id" value="{{ $idVehicleInit }}">
                                        <div class="form-group">
                                            <label for="entry_date_vehicle">Entry Date Vehicle</label>
                                            <input type="date" class="form-control" id="entry_date_vehicle"
                                                name="entry_date_vehicle">
                                        </div>
                                        <div class="form-group">
                                            <label for="service_month_vehicle">Service Month</label>
                                            <input type="number" class="form-control" id="service_month_vehicle"
                                                name="service_month_vehicle" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>License Number</th>
                                <th>Entry Date Vehicles</th>
                                <th>Service Month</th>
                                <th>Entry Date Service</th>
                                <th>Status</th>
                                <th>Status Vehicle</th>

                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($vehicles as $data)
                                <td>{{ $data->license_plate }}</td>

                                <td>{{ $data->entry_date_vehicle }}</td>
                                <td>{{ $data->service_month_vehicle }} month</td>
                                <td>{{ $data->service_date_vehicle }}</td>
                                <td>
                                    @if($data->is_service == 0)
                                    <span class="badge badge-success">Contidion Good</span>
                                    @else
                                    <span class="badge badge-danger">Service</span>
                                    @endif
                                </td>
                                <td>
                                    @if($data->status_vehicle == "available")
                                    <span class="badge badge-success">Available</span>
                                    @else
                                    <span class="badge badge-danger">Borrowed</span>
                                    @endif
                                </td>

                                <td>
                                    @can('admin', 'superior')
                                    <a href="{{ route('vehicles.history', $data->id) }}" class="btn btn-info btn-sm"><i
                                            class="fa fa-history"></i></a>

                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#updateModal{{ $data->id }}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    <!-- Update Modal -->
                                    <div class="modal fade" id="updateModal{{ $data->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="updateModalLabel{{ $data->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="updateModalLabel{{ $data->id }}">
                                                        Update Vehicle
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('vehicles.updateVehicle', $data->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="form-group">
                                                            <label for="license_plate">License Plate</label>
                                                            <input type="text" class="form-control" id="license_plate"
                                                                name="license_plate" value="{{ $data->license_plate }}"
                                                                required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="entry_date_vehicle">Entry Date Vehicle</label>
                                                            <input type="date" class="form-control"
                                                                id="entry_date_vehicle" name="entry_date_vehicle"
                                                                value="{{ $data->entry_date_vehicle }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="service_month_vehicle">Service Month</label>
                                                            <input type="number" class="form-control"
                                                                id="service_month_vehicle" name="service_month_vehicle"
                                                                value="{{ $data->service_month_vehicle }}" required>
                                                        </div>

                                                        <div class="form-group
                                                            form-check">
                                                            <input type="checkbox" class="form-check-input"
                                                                id="is_service" name="is_service" value="1"
                                                                @if($data->is_service == 1)
                                                            checked
                                                            @endif>
                                                            <label class="form-check-label"
                                                                for="is_service">Service</label>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <form id="deleteFormVehicles{{ $data->id }}" class="d-inline"
                                        action="{{ route('vehicles.destroyVehicle', $data->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm deleteButtonVehicles"
                                            data-id="{{ $data->id }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    @endcan
                                    @can('pegawai')
                                    @if($data->status_vehicle == "available")
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#borrowModal{{ $data->id }}">
                                        Borrow
                                    </button>
                                    @else
                                    <button type="button" class="btn btn-secondary btn-sm" disabled>
                                        Borrow
                                    </button>
                                    @endif

                                    <!-- Borrow Modal -->
                                    <div class="modal fade" id="borrowModal{{ $data->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="borrowModalLabel{{ $data->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="borrowModalLabel{{ $data->id }}">
                                                        Borrow
                                                        Vehicle</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('vehicles.borrow', $data->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="form-group">
                                                            <label for="date_borrow">Date Borrow</label>
                                                            <input type="date" class="form-control" id="date_borrow"
                                                                name="start_date" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="date_back_borrow">Date Back Borrow</label>
                                                            <input type="date" class="form-control"
                                                                id="date_back_borrow" name="end_date" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="notes">Notes</label>
                                                            <textarea class="form-control" id="notes" name="notes"
                                                                rows="3"></textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endcan
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        $('.deleteButtonVehicles').click(function () {
            var id = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#deleteFormVehicles'+id).submit();
                }
            });
        });
    });
</script>

@endsection