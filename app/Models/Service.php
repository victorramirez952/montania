<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';
    public $timestamps = false;
    protected $primaryKey = 'id_service';

    protected $fillable = [
        'id_service',
        'name',
        'cover_icon',
        'duration',
        'time_units',
        'sessions_number',
        'link_booking'
    ];

    public function getRouteKeyName()
    {
        return 'id_service';
    }

    public function prices(){
        return $this->hasMany('App\Models\Price', 'id_service', 'id_service');
    }

    public function contact(){
        return $this->belongsToMany('App\Models\Contact', 'contact_services', 'id_service', 'id_contact');
    }

    public function deliverables(){
        return $this->hasMany('App\Models\Deliverable', 'id_service', 'id_service');
    }

    public function collaborators(){
        return $this->belongsToMany('App\Models\Collaborator', 'service_collaborator', 'id_service', 'id_collaborator');
    }

    public function customers(){
        return $this->belongsToMany('App\Models\Customer', 'customer_service', 'id_service', 'id_customer');
    }

    public function images(){
        return $this->morphToMany('App\Models\Image', 'imageable', 'imageable', 'id_image', 'id_image');
    }
}
