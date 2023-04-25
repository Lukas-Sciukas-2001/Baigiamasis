<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class charges extends Model
{
    protected $table ='charges';
    protected $fillable = [
        'tipas',
        'charge_id',
        'uzsakymo_id',
        'suma'
    ];
    use HasFactory;
}
