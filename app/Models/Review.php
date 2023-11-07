<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    public $timestamps = false;
    protected $primaryKey = 'id_review';

    protected $fillable = [
        'id_review',
        'text',
        'id_project'
    ];

    public function project(){
        return $this->belongsTo('App\Models\Project', 'id_project', 'id_project');
    }
}
