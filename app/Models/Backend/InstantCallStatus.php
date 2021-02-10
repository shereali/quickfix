<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstantCallStatus extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'status_name'
    ];
}
