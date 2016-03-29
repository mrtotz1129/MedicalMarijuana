<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\UOMModel;

class UomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $measurementList = UOMModel::all();
        return view('maintenance-measurement')
                ->with('measurementList', $measurementList);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UomRequest $request)
    {
        $measurement = new UOMModel;
        $measurement->strUnitOfMeasurementName = $request->strMeasurementName;
        $measurement->strUnitOfMeasurementAbbrev = $request->strMeasurementAbbrev;
        $measurement->dblEquivalent = $request->dblEquivalent;
        $measurement->intStatus = 1;
        $measurement->save();
        return redirect('measurement');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $measurement = UOMModel::find($id);
        return response()->json($measurement);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $measurement = UOMModel::find($id);
        $measurement->strUnitOfMeasurementName = $request->strMeasurementName;
        $measurement->strUnitOfMeasurementAbbrev = $request->strMeasurementAbbrev;
        $measurement->dblEquivalent = $request->dblEquivalent;
        $measurement->save();
        return redirect('measurement');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $measurement = UOMModel::find($id);
        $measurement->intStatus = 0;
        $measurement->save();
        return redirect('measurement');
    }
}
