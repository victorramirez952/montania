<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaborator extends Model
{
    use HasFactory;
    protected $table = 'collaborators';
    public $timestamps = false;
    protected $primaryKey = 'id_collaborator';

    protected $fillable = [
        'id_collaborator',
        'first_names',
        'last_names',
        'profession',
        'avatar_image',
    ];

    public function services(){
        return $this->belongsToMany('App\Models\Service', 'service_collaborator', 'id_collaborator', 'id_service');
    }

    public function images(){
        return $this->morphToMany('App\Models\Image', 'imageable', 'imageable', 'id_image', 'id_image');
    }
}
