<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    public $timestamps = false;
    protected $primaryKey = 'id_customer';

    protected $fillable = [
        'phone',
        'address',
        'second_email',
        'id_user'
    ];

    public function getAuthIdentifier()
    {
        return $this->id_customer;
    }

    public function user() {
        return $this->hasOne('App\Models\User', 'id_user', 'id_user');
    }

    public function services(){
        return $this->belongsToMany('App\Models\Service', 'customer_service', 'id_customer', 'id_service');
    }

    public function projects(){
        return $this->belongsToMany('App\Models\Project', 'customer_project', 'id_customer', 'id_project');
    }
}
