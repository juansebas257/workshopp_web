<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model{
    protected $table = 'documents';
    protected $fillable = ['course','user','description','calification','type','file','teacher'];

    public function getCourse() {
        return $this->belongsTo('App\Course', 'course', 'id');
    }
    public function getUser() {
        return $this->belongsTo('App\User', 'user', 'id');
    }
}
