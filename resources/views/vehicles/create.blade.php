@extends('layouts.app')


@section('sidebar')
    @parent
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <a class="navbar-brand" href="#">{{!empty($vehicle)? 'Actualizar Vehiculo': 'Crear Vehiculo'}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/vehicle">Listar</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#">Crear</a>
                </li>
            </ul>
        </div>
    </nav>
@endsection

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (!empty($message))
    <div class="alert alert-success">
        <ul>
            <li>{{ $message }}</li>
        </ul>
    </div>
    @endif

    @if(!empty($vehicle))
    @section('title', 'Actualizar Vehiculo')

    <form method="POST" action="/vehicle/{{$vehicle->id}}">
    @method('PUT')
    @else
        @section('title', 'Crear Vehiculo')
    <form method="POST" action="/vehicle">
    @endif
        @csrf

        <div class="row justify-content-center">
            <div class="col-md-6">
                <label for="Placa">Placa del vehiculo:</label>
                <input type="text" class="form-control" name="licensePlate" id="licensePlate"
                       value="{{!empty($vehicle)? $vehicle->license_plate: ''}}">
            </div>
            <div class="col-md-6">
                <label for="Placa">Color:</label>
                <input type="text" class="form-control" name="color" id="color"
                       value="{{!empty($vehicle)? $vehicle->color: ''}}">
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <label for="Placa">Marca:</label>
                <input type="text" class="form-control" name="branch" id="branch"
                       value="{{!empty($vehicle)? $vehicle->branch: ''}}">
            </div>
            <div class="col-md-6">
                <label for="Placa">Modelo:</label>
                <input class="form-control" type="number" min="1900" max="2030" step="1"
                       value="{{!empty($vehicle)? $vehicle->model: '2021'}}" name="model"
                       id="model">
            </div>
        </div>
        <div class="row justify-content-center">
            <button type="submit" class="btn btn-lg btn-primary" style="margin-top: 2em">
                {{!empty($vehicle)? 'Actualizar': 'Guardar'}}
            </button>
        </div>

    </form>

@endsection
