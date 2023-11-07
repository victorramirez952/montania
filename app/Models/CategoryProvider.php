<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProvider extends Model
{
    use HasFactory;
    protected $table = 'categories_providers';
    public $timestamps = false;
    protected $primaryKey = 'id_category_provider';

    protected $fillable = [
        'id_category_provider',
        'name',
        'cover_icon',
        'id_contact'
    ];

    public function getRouteKeyName()
    {
        return 'id_category_provider';
    }

    public function contact(){
        return $this->belongsTo('App\Models\Contact', 'id_contact', 'id_contact');
    }
}
