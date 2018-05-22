<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model{
    protected $table = 'knowledge_areas';
    protected $fillable = ['name'];

    public function getCourses() {
        return $this->hasMany('App\Course', 'area', 'id');
    }
}
