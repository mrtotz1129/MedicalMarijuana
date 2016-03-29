<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('');
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
    public function store(ServiceRequest $request)
    {
        $service = new ServiceModel;
        $service->strServiceName = $request->strServiceName;
        $service->intDepartmentIdFK = $request->intDepartmentId;
        $service->intServiceStatus = 1;
        $service->save();

        $servicePrice = new ServicePriceModel;
        $servicePrice->deciServicePrice = $request->dblPrice;
        $servicePrice->intServiceIdFK = $service->intServiceId;
        $servicePrice->save();

        return redirect('service');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = ServiceModel::find($id);

        return response()->json($service);
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
        $service = ServiceModel::find($id);
        $service->strServiceName = $request->strServiceName;
        $service->intDepartmentIdFK = $request->intDepartmentId;
        $service->save();

        $dblServicePrice = ServicePriceModel::where('intServiceId', $id)
                                ->orderBy('created_at', 'desc')
                                ->first();
        if ($dblServicePrice != $request->dblPrice){
            $servicePrice = new ServicePrice;
            $servicePrice->intServiceIdFK = $id;
            $servicePrice->deciServicePrice = $request->dblPrice;
            $servicePrice->save();
        }

        return redirect('service');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
