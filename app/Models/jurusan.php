<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function student()
    {
        return $this->hasMany(student::class);
    }
    public function galeri()
    {
        return $this->hasMany(student::class);
    }
}