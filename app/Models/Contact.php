<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';
    public $timestamps = false;
    protected $primaryKey = 'id_contact';

    protected $fillable = [
        'id_contact',
        'first_names',
        'last_names',
        'phone'
    ];

    public function categories_providers(){
        return $this->hasMany('App\Models\CategoryProvider', 'id_contact', 'id_contact');
    }

    public function services(){
        return $this->belongsToMany('App\Models\Service', 'contact_services', 'id_contact', 'id_service');
    }
}
