<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class uzsakym extends Model
{
    protected $table ='uzsakymai';
    protected $fillable = [
        'user_id',
        'keliones_id',
        'patvirt_busena',
        'vardas',
        'pavarde',
        'uzmokest_tipas',
        'kaina',
    ];
    use HasFactory;
}
