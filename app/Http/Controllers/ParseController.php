<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ParseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $xml = XmlParser::load('v2.xml');
        $ack = $xml->parse([
            'MSH' => ['uses' => 'ack.msh'],
            'MSH.1' => ['uses' => 'ack.msh1'],
            'MSH.2' => ['uses' => 'ack.msh2'],
            'MSH.3' => ['uses' => 'ack.msh3'],
            'MSH.4' => ['uses' => 'ack.msh4'],
            'MSH.5' => ['uses' => 'ack.msh5'],
            'MSH.6' => ['uses' => 'ack.msh6'],
            'MSH.7' => ['uses' => 'ack.msh7'],
            'MSH.8' => ['uses' => 'ack.msh8'],
            'MSH.9' => ['uses' => 'ack.msh9'],
            'MSH.10' => ['uses' => 'ack.msh10'],
            'MSH.11' => ['uses' => 'ack.msh11'],
            'MSH.12' => ['uses' => 'ack.msh12'],
            'EVN' => ['uses' => 'ack.evn'],
            'EVN.1' => ['uses' => 'ack.evn1'],
            'EVN.2' => ['uses' => 'ack.evn2'],
            'EVN.3' => ['uses' => 'ack.evn3'],
            'EVN.4' => ['uses' => 'ack.evn4'],
            'EVN.5' => ['uses' => 'ack.evn5'],
            'EVN.6' => ['uses' => 'ack.evn6'],
        ]);

        $pid = $xml->parse([
            'PID.3' => ['uses' => 'pid.pid3'],
            'CX.1' => ['uses' => 'pid.pid3.cx1'],
            'CX.4' => ['uses' => 'pid.pid3.cx4'],
            'CX.5' => ['uses' => 'pid.pid3.cx5'],
            'CX.8' => ['uses' => 'pid.pid3.cx8'],
            'CX.9' => ['uses' => 'pid.pid3.cx9'],
        ]);




        return view('xml')->with('ack', $ack)->with('pid', $pid);

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
        //
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
