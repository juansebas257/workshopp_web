<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model{
    protected $table = 'courses';
    protected $fillable = ['area','name'];

    public function getCourses() {
        return $this->hasMany('App\Course', 'area', 'id');
    }
}
