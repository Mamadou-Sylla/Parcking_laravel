<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Customer::paginate(10);
        return view('customer.index', compact('data')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        
        return view('customer.create');
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
            'firstname' => ['required'],
            'lastname' => ['required'],
            'cni' => ['required', 'unique:customers', 'size:13'],
            'call' => ['required', 'unique:customers', 'max:15', 'min:9'],
            'mail' => ['required', 'email'],
            'address' => ['required'],
            'avatar' => ['required', 'image', 'max:64']
            ]);

            $owner = new Customer();
            $owner->firstname = $request->firstname;  
            $owner->lastname = $request->lastname;   
            $owner->cni = $request->cni;   
            $owner->call = $request->call;   
            $owner->email = $request->mail;   
            $owner->address = $request->address; 
            $avatar = $request->files->get("avatar");
            $image = fopen($avatar->getRealPath(),"rb");
            $size=filesize ($avatar);
            $contents= fread ($image, $size);
            // $imageBase64 = base64_encode($contents);
            // dd($contents);
            $owner->avatar = $contents;
            $owner->save();   
            fclose ($image) ; 

            session()->flash('alertAdd', 'Owner created successfully');
            return redirect()->route('customer.index');
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
        $customer = Customer::find($id);
        return view('customer.update', compact('customer'));       
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
        $validateData = $request->validate([
            'firstname' => ['required'],
            'lastname' => ['required'],
            'cni' => ['required', 'size:13'],
            'call' => ['required', 'max:15', 'min:9'],
            'mail' => ['required', 'email'],
            'address' => ['required']
            ]);

        $owner = Customer::find($request->id);
        // dd($owner);
        $owner->firstname = $request->firstname;  
        $owner->lastname = $request->lastname;   
        $owner->cni = $request->cni;   
        $owner->call = $request->call;   
        $owner->email = $request->mail;   
        $owner->address = $request->address; 
        $avatar = $request->files->get("avatar");
        if( $avatar != null)
        {
            $image = fopen($avatar->getRealPath(),"rb");
            $size=filesize ($avatar);
            $contents= fread ($image, $size);
            $owner->avatar = $contents; 
        }   
        $owner->save(); 
        session()->flash('alertUpdate', 'Owner updated successfully');
        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $owner = Customer::find($id);
        $owner->delete();
        session()->flash('alertDelete', 'Owner deleted successfully');
        return back();
    }

}
