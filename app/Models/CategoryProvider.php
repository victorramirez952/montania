<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryProvider extends Model
{
    use HasFactory;
    protected $table = 'categories_providers';
    public function getRouteKeyName()
    {
        return 'id_category_provider';
    }
}
