<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'model', 'year', 'passengers', 'manufacturer', 'price', 'vehicle_type', 'fuel_type', 'trunk_area', 'tire_count', 'cargo_area', 'luggage_size', 'fuel_capacity'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

}
