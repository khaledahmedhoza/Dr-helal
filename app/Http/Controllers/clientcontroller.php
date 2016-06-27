<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client as Client;
use App\History as History;
use App\Http\Requests;
use DB;

class clientcontroller extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('newpatient');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $data)
    {
    	$client = new Client;
    	$client->name = $data['name'];
    	$client->save();

    	$client = Client::orderBy('id','desc')->first();
        $hist = DB::select('select * from histories where clientid = ? order by created_at desc',[$client->id]);
    	$data =  array('client' => $client );
    	//var_dump($data);
        return view('showclient', compact('hist','data','client'));
        //return view('showclient',$data);
    }

    public function edit(Request $data)
    {
        $id = $data['id'];
        $client = Client::find($id);
        $data = array('id' => $id ,'client' => $client);
        return view('editpatient',$data);
    }

    public function update(Request $data)
    {
        $id = $data['id'];
        $name = $data['name'];
        $client = Client::find($id);
        $client->name = $name;
        $client->save();
        $clients = Client::all();
        $data =  array('clients' => $clients );
        return view('home',$data);
    }

    public function delete(Request $data)
    {
        $id = $data['id'];
        $client = Client::find($id);
        $client->delete();
        $clients = Client::all();
        $data =  array('clients' => $clients );
        return view('home',$data);
    }

    public function show(Request $data)
    {
        $id = $data['id'];
        $client = Client::find($id);
        $hist = DB::select('select * from histories where clientid = ? order by created_at desc',[$id]);
        $data = array('hist' => $hist,'client' => $client);
        return view('showclient',$data);
    }

}
