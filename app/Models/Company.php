<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['country_id', 'city_id', 'name', 'email', 'address', 'website'];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
