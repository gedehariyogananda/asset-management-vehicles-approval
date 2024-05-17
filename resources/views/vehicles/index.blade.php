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

                    <h6 class="m-0 font-weight-bold">Vehicles Data</h6>

                    @can('admin')
                    <h6 class="m-0 font-weight-bold text-primary">
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                            data-target="#addVehicleModal">
                            <i class="fa fa-plus"></i> Add Vehicle
                        </button>
                    </h6>
                    @endcan

                    <!-- Add Vehicle Modal -->
                    <div class="modal fade" id="addVehicleModal" tabindex="-1" role="dialog"
                        aria-labelledby="addVehicleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addVehicleModalLabel">Add Vehicle</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('vehicles.store') }}" method="POST">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="name_vehicle">Name Vehicle</label>
                                            <input type="text" class="form-control" id="name_vehicle"
                                                name="name_vehicle" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="brand_vehicle">Brand Vehicle</label>
                                            <input type="text" class="form-control" id="brand_vehicle"
                                                name="brand_vehicle" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="type_vehicle">Type Vehicle</label>

                                            <select name="type_vehicle" id="type_vehicle" class="form-control" required>
                                                <option value="" disabled selected>-- Select Type Vehicle-- </option>
                                                <option value="Mobil Sewa">Mobil Sewa</option>
                                                <option value="Mobil Angkutan Barang">Mobil Angkutan Barang</option>
                                                <option value="Mobil Angkutan Orang">Mobil Angkutan Orang</option>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="bbm_vehicle">BBM Vehicle</label>
                                            <input type="text" class="form-control" id="bbm_vehicle" name="bbm_vehicle"
                                                required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
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
                                <th>Vehicle ID</th>
                                <th>Name Vehicle</th>
                                <th>Brand Vehicle</th>
                                <th>Type Vehicle</th>
                                <th>Consum BBM Vehicle</th>
                                <th>Count</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach($dataset as $data)
                                <td>#000{{ $data->id }}</td>
                                <td>{{ $data->name_vehicle }}</td>
                                <td>{{ $data->brand_vehicle }}</td>
                                <td>{{ $data->type_vehicle }}</td>
                                <td>{{ $data->bbm_vehicle }} km/l</td>
                                <td>{{ $data->vehicles->count() }}</td>
                                <td>
                                    <a href="{{ route('vehicles.show', $data->id) }}" class="btn btn-info btn-sm">See
                                        All</a>
                                    @can('admin')

                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                        data-target="#editVehicleModal{{ $data->id }}">
                                        Edit
                                    </button>

                                    {{-- modal edit --}}
                                    <div class="modal fade" id="editVehicleModal{{ $data->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="editVehicleModalLabel{{ $data->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editVehicleModalLabel{{ $data->id }}">
                                                        Edit Vehicle</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('vehicles.update', $data->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="name_vehicle">Name Vehicle</label>
                                                            <input type="text" class="form-control" id="name_vehicle"
                                                                name="name_vehicle" value="{{ $data->name_vehicle }}"
                                                                required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="brand_vehicle">Brand Vehicle</label>
                                                            <input type="text" class="form-control" id="brand_vehicle"
                                                                name="brand_vehicle" value="{{ $data->brand_vehicle }}"
                                                                required>
                                                        </div>
                                                        <div class="form-group">

                                                            <label for="type_vehicle">Type Vehicle</label>
                                                            <select name="type_vehicle" id="type_vehicle"
                                                                class="form-control" required>
                                                                <option value="" disabled selected>-- Select Type
                                                                    Vehicle-- </option>
                                                                <option value="Mobil Sewa" @if($data->type_vehicle ==
                                                                    "Mobil Sewa") selected @endif>Mobil Sewa</option>
                                                                <option value="Mobil Angkutan Barang" @if($data->
                                                                    type_vehicle == "Mobil Angkutan Barang") selected
                                                                    @endif>Mobil Angkutan Barang</option>
                                                                <option value="Mobil Angkutan Orang" @if($data->
                                                                    type_vehicle == "Mobil Angkutan Orang") selected
                                                                    @endif>Mobil Angkutan Orang</option>
                                                            </select>

                                                        </div>
                                                        <div class="form-group">
                                                            <label for="bbm_vehicle">BBM Vehicle</label>
                                                            <input type="text" class="form-control" id="bbm_vehicle"
                                                                name="bbm_vehicle" value="{{ $data->bbm_vehicle }}"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    <form action="{{ route('vehicles.destroy', $data->id) }}" method="POST"
                                        style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
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

@endsection