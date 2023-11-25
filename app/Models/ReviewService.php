<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewService extends Model
{
    use HasFactory;
    protected $table = 'reviews_service';
    public $timestamps = false;
    protected $primaryKey = 'id_review_service';

    protected $fillable = [
        'id_review_service',
        'text',
        'id_customer',
        'id_service'
    ];

    public function service(){
        return $this->belongsTo('App\Models\Service', 'id_service', 'id_service');
    }

    public function customer(){
        return $this->belongsTo('App\Models\Customer', 'id_customer', 'id_customer');
    }
}
