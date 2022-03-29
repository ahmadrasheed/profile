<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable=[
        'fname','lname','birth','nickname','subject'
    ];

public function school(){

    return $this->belongsTo(School::class)->withDefault([
        'name' => 'No School yet',
    ]);
}



}
