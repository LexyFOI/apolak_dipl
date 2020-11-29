<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function path(){
        return "/events/{$this->id}";
    }

    public function owner(){
        return $this->belongsTo(User::class);
    }

    public function payments(){
        return $this->hasMany(PaymentEvidence::class);
    }

  public function addStudent($student_id){
        return $this->payments()->create(compact('student_id'));
   }
}
