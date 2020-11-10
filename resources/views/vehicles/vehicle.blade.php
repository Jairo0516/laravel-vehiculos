@extends('layouts.app')

@section('title', 'Vehiculos')

@section('sidebar')
    <nav class="navbar navbar-dark bg-dark navbar-expand-lg">
        <a class="navbar-brand" href="#">Vehiculos</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/vehicle">Listar</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/vehicle/create">Crear</a>
                </li>
            </ul>
        </div>
    </nav>
@endsection

@section('content')
    @if (!empty($message))
        <div class="alert alert-success">
            <ul>
                <li>{{ $message }}</li>
            </ul>
        </div>
    @endif

    <table class="table table-hover table-dark">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Placa</th>
            <th scope="col">Color</th>
            <th scope="col">Modelo</th>
            <th scope="col">Marca</th>
            <th scope="col">Creado</th>
            <th scope="col">Actualizado</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($vehicles as $vehicle)
            <tr>
                <th>{{$vehicle->id}}</th>
                <td>{{$vehicle->license_plate}}</td>
                <td>{{$vehicle->color}}</td>
                <td>{{$vehicle->model}}</td>
                <td>{{$vehicle->branch}}</td>
                <td>{{$vehicle->created_at}}</td>
                <td>{{$vehicle->updated_at}}</td>
                <td>
                    <a href="/vehicle/update/{{$vehicle->id}}" class="btn btn-lg btn-primary">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <form method="POST" action="/vehicle/delete/{{$vehicle->id}}" >
                        @method('PUT')
                        @csrf
                        <button type="submit" class="btn btn-lg btn-primary">
                            <i class="fa fa-minus-circle"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
