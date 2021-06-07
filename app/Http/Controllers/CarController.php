<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Mail\SendMail;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customer = Customer::all();
        return view('car.create', compact('customer'));
        // return view('car.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'brand' => ['required'],
            'model' => ['required'],
            'number' => ['required'],
            'status' => ['required'],
            'withdrawal' => ['required'],
            'owner' => ['required'],
            ]);
        $car = new Car();
        $car->brand = $request->brand;  
        $car->model = $request->model;   
        $car->number = $request->number;   
        $car->status = $request->status;   
        $car->withdrawal = $request->withdrawal; 
        $car->customer_id = $request->owner;
        $ownerInfo = Customer::find($car->customer_id);
        $ownerMail = $ownerInfo->email;
        // dd($ownerMail); 
        $car->save(); 
        $data = ['owner' => $ownerInfo, 'car' => $car];
        Mail::to($ownerMail)->send(new SendMail($data));
        session()->flash('alertAdd', 'Car created successfully');   
        return redirect()->route('home');
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
        $car = Car::find($id);
        $ownerId = $car->customer_id;
        $ownerInfo = Customer::find($ownerId);
        $customer = Customer::all();
        return view('car.update', compact('car', 'ownerInfo', 'customer'));
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
        $validateData = $request->validate([
            'brand' => ['required'],
            'model' => ['required'],
            'number' => ['required'],
            'status' => ['required'],
            'withdrawal' => ['required'],
            'owner' => ['required'],
            ]);
        $car = Car::find($request->id);
        $car->brand = $request->brand;  
        $car->model = $request->model;   
        $car->number = $request->number;   
        $car->status = $request->status;
        $car->filing = $request->filing;    
        $car->withdrawal = $request->withdrawal;  
        $car->customer_id = $request->owner;   
        $car->save();    
        session()->flash('alertUpdate', 'Car updated successfully');
         return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id);
        $car->delete();
        session()->flash('alertDelete', 'Car deleted successfully');
        return back();
    }
}
