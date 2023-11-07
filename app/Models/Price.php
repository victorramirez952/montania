<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    protected $table = 'prices';
    public $timestamps = false;
    protected $primaryKey = 'id_price';

    protected $fillable = [
        'id_price',
        'id_service',
        'description',
        'price',
        'm2',
        'price_cover'
    ];

    public function getRouteKeyName()
    {
        return 'id_price';
    }

    public function service(){
        return $this->belongsTo('App\Models\Service', 'id_service', 'id_service');
    }
}
