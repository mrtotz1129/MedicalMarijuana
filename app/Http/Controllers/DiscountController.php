<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\RequirementModel;
use App\DiscountModel;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $requirementList = RequirementModel::all()
                                ->where('intRequirementStatus', 1);
        $discountList = DiscountModel::all()
                                ->where('intDiscountStatus', 1);
        return view('maintenance-discount')
            ->with('requirementList', $requirementList)
            ->with('discountList', $discountList);
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
    public function store(Request $request)
    {
        $requirementList[] = $request->requirementList;
        $discount = new DiscountModel;

        $discount->strDiscountName = $request->strDiscountName;
        $discount->intDiscountTypeId = $request->intDiscountTypeId;
        if ($discount->intDiscountTypeId == 1){
            $discount->dblDiscountPercent = $request->dblDiscount;
        }else{
            $discount->dblDiscountAmount = $request->dblDiscount;
        }
        $discount->intDiscountStatus = 1;
        $discount->save();

       foreach ($requirementList as $requirement){
            \DB::insert([
                'intDiscountIdFK' => $discount->intDiscountId,
                'intRequirementIdFK' => $requirement[0],
                'intStatus' => 1
                ]);
        }

        return redirect('discount');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
