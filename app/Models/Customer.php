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
}
