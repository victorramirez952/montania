<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    public $timestamps = false;
    protected $primaryKey = 'id_project';

    protected $fillable = [
        'id_project',
        'name',
        'place',
        'start_date',
        'end_date',
        'type',
        'description',
        'id_review'
    ];

    public function getRouteKeyName()
    {
        return 'id_project';
    }

    public function customers(){
        return $this->belongsToMany('App\Models\Customer', 'customer_project', 'id_project', 'id_customer');
    }

    public function resources(){
        return $this->hasMany('App\Models\Resource', 'id_project', 'id_project');
    }

    public function stages(){
        return $this->hasMany('App\Models\Stage', 'id_project', 'id_project');
    }

    public function reviews(){
        return $this->hasMany('App\Models\Review', 'id_project', 'id_project');
    }

    public function images(){
        return $this->morphToMany('App\Models\Image', 'imageable', 'imageable', 'id_image', 'id_image');
    }
}
