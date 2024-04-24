<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\perkuliahan;
use App\Http\Requests\StoreperkuliahanRequest;
use App\Http\Requests\UpdateperkuliahanRequest;


class PerkuliahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =  perkuliahan::with('mahasiswa', 'mataKuliah')->get();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreperkuliahanRequest $request)
    {
        $data = perkuliahan::create($request->validated());
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $nim)
    {
        $data =  perkuliahan::where('nim', $nim)->get();
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(perkuliahan $perkuliahan)
    {
        return view('edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateperkuliahanRequest $request, string $nim, string $kode_mk)
    {
        $data = perkuliahan::where('nim', $nim)->where('kode_mk', $kode_mk)->first();

        $data->update($request->validated());

        return response()->json([$data]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $nim, string $kode_mk)
    {
        $data = perkuliahan::where('nim', $nim)->where('kode_mk', $kode_mk);
        $data->delete();

        return response()->json(['message' => 'perkuliahan deleted']);
    }
}
