<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;
    protected $table = 'stages';
    public $timestamps = false;
    protected $primaryKey = 'id_stage';

    protected $fillable = [
        'id_stage',
        'id_project',
        'date',
        'description',
        'completed'
    ];

    public function project(){
        return $this->belongsTo('App\Models\Project', 'id_project', 'id_project');
    }
}
