<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Customer;
use Illuminate\Http\Request;

class HomeController extends Controller
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
    public function index(Car $customers)
    {
        $data = Car::paginate(10);
        
         $customer = Customer::all();
         return view('home', compact('data', 'customer')); 
    }

     /**
     * Show the about page.
     *
     * @return \Illuminate\Http\Response
     */
    public function about()
    {
         return view('about'); 
    }

}
