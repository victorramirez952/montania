<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Montania extends Model
{
    use HasFactory;
    protected $table = 'montania';
    public $timestamps = false;
    protected $primaryKey = 'id_montania';

    protected $fillable = [
        'id_montania',
        'slogan',
        'history',
        'history_image',
        'mission',
        'mission_image',
        'vission',
        'vission_image'
    ];

    public function images(){
        return $this->morphToMany('App\Models\Image', 'imageable', 'imageable', 'id_image', 'id_image');
    }
}
