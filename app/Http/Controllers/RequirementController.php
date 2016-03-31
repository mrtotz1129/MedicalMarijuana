<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\RequirementRequest;
use App\Http\Controllers\Controller;

use App\RequirementModel;

class RequirementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requirementList = RequirementModel::where('intRequirementStatus', '>', 0)
            ->get();
        return view('maintenance-requirements')->with('requirementList', $requirementList);
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
    public function store(RequirementRequest $request)
    {
        $requirement                        =          new RequirementModel;
        $requirement->strRequirementName    =          $request->strRequirementName;
        $requirement->txtRequirementDesc    =          $request->txtRequirementDesc;
        $requirement->intRequirementStatus  =          1;
        $requirement->save();

        return redirect('requirement');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $requirement = RequirementModel::find($id);
        return response()->json($requirement);
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
        $requirement = RequirementModel::find($id);
        $requirement->strRequirementName = $request->requirementName;
        $requirement->txtRequirementDesc = $request->requirementDesc;
        $requirement->intRequirementStatus = 1;
        $requirement->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $requirement = RequirementModel::find($id);
        $requirement->intRequirementStatus = 0;
        $requirement->save();
    }
}
