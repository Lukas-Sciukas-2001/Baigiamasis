<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class transport extends Model
{
    protected $table ='transportas';
    protected $fillable = [
        'modelis',
        'identif',
        'vietos',
        'technikinis',
    ];
    use HasFactory;
    protected $dates = ['deleted_at'];
}
