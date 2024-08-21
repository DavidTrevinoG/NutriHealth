<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dieta extends Model
{
    use HasFactory;

    protected $table = 'dietas';
    protected $primaryKey = 'id_dieta';

    protected $fillable = [
        'colacion1',
        'colacion2',
        'colacion3',
        'colacion4',
        'colacion5',
        'calorias',
    ];
    public function colacion1()
    {
        return $this->belongsTo(Colacion::class, 'colacion1');
    }
    
    public function colacion2()
    {
        return $this->belongsTo(Colacion::class, 'colacion2');
    }
    
    public function colacion3()
    {
        return $this->belongsTo(Colacion::class, 'colacion3');
    }
    
    public function colacion4()
    {
        return $this->belongsTo(Colacion::class, 'colacion4');
    }
    
    public function colacion5()
    {
        return $this->belongsTo(Colacion::class, 'colacion5');
    }
    
}


