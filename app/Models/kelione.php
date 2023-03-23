<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelione extends Model
{
    protected $table ='keliones';
    protected $fillable = [
        'pradzia_salis',
        'pradzia_miestas',
        'stotis',
        'aprasymas',
        'vairuotojo_id',
        'tikslas_salis',
        'tikslas_miestas',
        'transporto_id',
        'kaina_suaug',
        'kaina_vaikam',
        'isvykimas',
        'gryzimas',
    ];
    use HasFactory;
}
