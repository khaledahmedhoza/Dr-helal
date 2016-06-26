<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\History as History;
use App\Client as Client;
use DB;
use App\Http\Requests;

class tashkhesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $data)
    {
        $id = $data['id'];
        $data = array('id' => $id);
        return view('newtashkhes',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $data)
    {
        $patientid = $data['patientid'];
        $tashkhes = $data['tash'];

        $history = new History;
        $history->clientid = $patientid;
        $history->tashkhes = $tashkhes;
        $history->save();

        $client = Client::find($patientid);
        $hist = DB::select('select * from histories where clientid = ? order by created_at desc',[$patientid]);
        $data = array('hist' => $hist,'client' => $client);
        return view('showclient',$data);
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
    public function edit(Request $data)
    {
        $tashid = $data['tashid'];
        $tash = History::find($tashid);
        $data = array('tashid'=> $tashid , 'tash' => $tash);
        return view('edittashkhes',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $tashid = $request['tashid'];
        $tash = $request['tash'];

        $history = History::find($tashid);
        $history->tashkhes = $tash;
        $history->save();

        $client = Client::find($history->clientid);
        $hist = DB::select('select * from histories where clientid = ? order by created_at desc',[$history->clientid]);
        $data = array('hist' => $hist,'client' => $client);
        return view('showclient',$data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $tashid = $request['tashid'];
        $history = History::find($tashid);
        $client = Client::find($history->clientid);
        $history->delete();

        $hist = DB::select('select * from histories where clientid = ? order by created_at desc',[$client->id]);
        $data = array('hist' => $hist,'client' => $client);
        return view('showclient',$data);
    }
}
