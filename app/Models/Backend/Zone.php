<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'division_id',
        'district_id',
        'service_type_id',
        'charge',
        'name',
        'description',
        'image',
        'status',
    ];
}
