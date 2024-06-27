<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContractorCollection;
use App\Http\Resources\ContractorResource;
use App\Models\Contractor;
use Illuminate\Http\Request;

class ContractorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ContractorCollection(Contractor::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:50'],
            'inn' => ['required', 'digits:10', 'unique:contractors'],
            'email' => ['required', 'email:rfc,dns', 'unique:contractors']
        ]);
        $contractor = Contractor::create([
            'name' => $request->input('name'),
            'inn' => $request->input('inn'),
            'email' => $request->input('email')
        ]);
        return (new ContractorResource($contractor))
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contractor $contractor)
    {
        return (new ContractorResource($contractor))
            ->response()
            ->setStatusCode(200);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contractor $contractor)
    {
        $request->validate([
            'name' => ['required', 'max:50'],
            'inn' => ['required', 'digits:10', 'unique:contractors'],
            'email' => ['required', 'email:rfc,dns', 'unique:contractors']
        ]);
        $contractor->update([
            'name' => $request->input('name'),
            'inn' => $request->input('inn'),
            'email' => $request->input('email')
        ]);
        return (new ContractorResource($contractor))
            ->response()
            ->setStatusCode(200);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contractor $contractor)
    {
        $contractor->delete();
        return response()->json(null, 204);
    }
}
