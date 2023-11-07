<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliverable extends Model
{
    use HasFactory;
    protected $table = 'deliverables';
    public $timestamps = false;
    protected $primaryKey = 'id_deliverable';

    protected $fillable = [
        'id_deliverable',
        'id_service',
        'title',
        'description'
    ];

    public function service(){
        return $this->belongsTo('App\Models\Service', 'id_service', 'id_service');
    }
}
