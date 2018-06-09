<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model{
    protected $table = 'courses';
    protected $fillable = ['area','name'];

    public function getDocuments() {
        return $this->hasMany('App\Document', 'course', 'id');
    }
}
