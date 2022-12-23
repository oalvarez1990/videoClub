<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;
    protected $table = 'films';
    protected $fillable = [
        'title',
        'description',
        'release_date',
        'rating',
        'ticket_price',
    ];
    // public function customers()
    // {
    //     return $this->hasMany(Customer::class);
    // }
    
}
