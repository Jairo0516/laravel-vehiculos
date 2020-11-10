<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\VarDumper\VarDumper;

class VehicleController extends Controller

{
    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'licensePlate' => 'required',
            'color' => 'required',
            'branch' => 'required',
            'model' => 'required',
        ],
            [
                'licensePlate.required' => 'El campo placa es requerido.',
                'color.required' => 'El campo color es requerido.',
                'branch.required' => 'El campo marca es requerido.',
                'model.required' => 'El campo modelo es requerido.',
            ]
        );

        if ($validator->fails()) {
            return redirect('vehicle/create')
                ->withErrors($validator)
                ->withInput();
        }

        $vehicle = new Vehicle();
        $vehicle->license_plate = strtoupper($request->licensePlate);
        $vehicle->color =  strtoupper($request->color);
        $vehicle->branch =  strtoupper($request->branch);
        $vehicle->model =  strtoupper($request->model);
        $vehicle->created_at = \Carbon\Carbon::now();
        $vehicle->updated_at = \Carbon\Carbon::now();
        $vehicle->save();

        return view('vehicles/create', ['message' => 'Almacenado correctamente']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = Vehicle::find($id);
        return view('/vehicles/create', ['vehicle' => $vehicle]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vehicle = Vehicle::find($id);
        return $vehicle;
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all()
    {
        $vehicles = Vehicle::all();
        return view('/vehicles/vehicle', ['vehicles' => $vehicles]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->license_plate = strtoupper($request->licensePlate);
        $vehicle->color =  strtoupper($request->color);
        $vehicle->branch =  strtoupper($request->branch);
        $vehicle->model =  strtoupper($request->model);
        $vehicle->updated_at = \Carbon\Carbon::now();
        $vehicle->save();
        return view('/vehicles/create', ['vehicle' => $vehicle, 'message' => 'Actualizado correctamente']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        $vehicle = Vehicle::find($id);
        $vehicle->delete();
        $vehicles = Vehicle::all();

        return redirect('/vehicle');
    }
}
