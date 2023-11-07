<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;
    protected $table = 'resources';
    public $timestamps = false;
    protected $primaryKey = 'id_resource';

    protected $fillable = [
        'id_resource',
        'title',
        'link',
        'id_project'
    ];

    public function project(){
        return $this->belongsTo('App\Models\Project', 'id_project', 'id_project');
    }
}
