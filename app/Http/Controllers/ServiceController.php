<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\ServiceRequest;
use App\Http\Controllers\Controller;

use App\ServiceModel;
use App\ServicePriceModel;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceList = ServiceModel::where('intServiceStatus', 1)
            ->get();
        foreach ($serviceList as $service) {
            $servicePrice = ServicePriceModel::where('intServiceIdFK', $service->intServiceId)
                                        ->orderBy('created_at', 'desc')
                                        ->first();
            $service->service_price = $servicePrice->deciServicePrice;
        }

        return view('maintenance-services')
                ->with('serviceList', $serviceList);
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
        // $service->intDepartmentIdFK = $request->intDepartmentId;
        $service->intServiceStatus = 1;
        $service->txtServiceDesc = $request->txtServiceDesc;
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
        $servicePrice = ServicePriceModel::where('intServiceIdFK', $service->intServiceId)
                            ->orderBy('created_at', 'desc')
                            ->first();
        $service->service_price = $servicePrice->deciServicePrice;
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
        $service                        = ServiceModel::find($id);
        $service->strServiceName        = $request->strServiceName;
        // $service->intDepartmentIdFK  = $request->intDepartmentId;
        $service->txtServiceDesc        = $request->txtServiceDesc;
        // $service->save();

        $servicePriceOrig = ServicePriceModel::where('intServiceIdFK', $service->intServiceId)
                            ->orderBy('created_at', 'desc')
                            ->first();
        if ($servicePriceOrig->deciServicePrice != $request->dblPrice){
            $servicePrice = new ServicePriceModel;
            $servicePrice->deciServicePrice = $request->dblPrice;
            $servicePrice->intServiceIdFK = $service->intServiceId;
            $servicePrice->save();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = ServiceModel::find($id);
        $service->intServiceStatus = 0;
        $service->save();
    }
}
