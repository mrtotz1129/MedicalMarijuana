<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\FeeRequest;

use App\FeeTypeModel;
use App\FeeModel;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeTypes = FeeTypeModel::where('intStatus', '>', 0)
            ->get();

        $fees = \DB::table('tblFee')
            ->join('tblFeeType', 'tblFeeType.intFeeTypeId', '=', 'tblFee.intFeeTypeIdFK')
            ->select('tblFee.intFeeId', 'tblFee.strFeeName', 'tblFee.txtFeeDesc', 'tblFee.dblPrice'
                , 'tblFeeType.strFeeTypeName')
            ->where('tblFee.intStatus', '>', 0)
            ->where('tblFeeType.intStatus', '>', 0)
            ->get();
        
        return view('maintenance-fees')
            ->with('feeTypes', $feeTypes)
            ->with('fees', $fees);
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
    public function store(FeeRequest $request)
    {
        $fee = new FeeModel;

        $fee->strFeeName        =   $request->input('strFeeName');
        $fee->txtFeeDesc        =   $request->input('txtFeeDesc');
        $fee->dblPrice          =   $request->input('dblPrice');
        $fee->intFeeTypeIdFK    =   $request->input('feeTypeSelect');
        $fee->intStatus         =   1;    

        $fee->save();

        return redirect('fee');   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fee = FeeModel::find($id);

        return response()->json($fee);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fee = FeeModel::find($id);

        $fee->intStatus = 0;

        $fee->save();
    }
}
