<?php

namespace App\Models;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Car extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'brand', 'model', 'number', 'status','customer_id'
    ];

    public function owners()
    {
        return $this->belongsTo(Customer::class); 
    }
}
