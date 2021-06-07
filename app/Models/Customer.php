<?php

namespace App\Models;

use App\Models\Car;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'firstname', 'lastname', 'cni', 'call', 'email', 'address', 'avatar'
    ];

    public function cars()
    {
        return $this->hasMany(Car::class);
    }
    
}
