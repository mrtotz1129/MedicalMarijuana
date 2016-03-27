<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SupplierRequest;
use App\Http\Controllers\Controller;

use App\SupplierModel;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = SupplierModel::where('intStatus', '>', 0)
            ->get();

        return view('maintenance-supplier')
            ->with('suppliers', $suppliers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SupplierRequest $request)
    {
        $supplier           =   new SupplierModel;
        $supplierName       =   $request->strSupplierName;
        $imagePath          =   'uploaded_images/supplier';


        $supplier->strSupplierName      =   $supplierName;
        $supplier->strSupplierAddress   =   $request->strSupplierAddress;
        $supplier->strSupplierContactNo =   $request->strSupplierContactNo;
        $supplier->intStatus            =   1;
        
        if($request->hasFile('image')) {
            $request->file('image')->move(public_path() . '/' . $imagePath, $supplierName);
            
            $supplier->txtImagePath =   $imagePath . '/' . $supplierName;
        } else {
            $supplier->txtImagePath =   null;
        } 

        $supplier->save();

        return redirect('supplier');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $supplier = SupplierModel::find($id);

        return response()->json($supplier);
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
        $supplier               =   SupplierModel::find($id);

        $supplier->intStatus    =   0;

        $supplier->save();
    }

    public function updateSupplier(Request $request)
    {
        $supplier           =   SupplierModel::find($request->supplierId);
        $supplierName       =   $request->strSupplierName;
        $imagePath          =   'uploaded_images/supplier';

        $supplier->strSupplierName      =   $request->strSupplierName;
        $supplier->strSupplierAddress   =   $request->strSupplierAddress;
        $supplier->strSupplierContactNo =   $request->strSupplierContactNo;

        if($request->hasFile('image')) {
             $request->file('image')->move(public_path() . '/' . $imagePath, $supplierName);
            
            $supplier->txtImagePath =   $imagePath . '/' . $supplierName;
        }

        $supplier->save();

        return redirect('supplier');
    }
}
