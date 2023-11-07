<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table = 'images';
    public $timestamps = false;
    protected $primaryKey = 'id_image';

    protected $fillable = [
        'id_image',
        'image',
        'alt',
        'position'
    ];

    public function Imageable(){
        return $this->morphTo();
    }
}
