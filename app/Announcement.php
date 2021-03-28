<?php

namespace App;

use App\Kelas;
use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = ['title', 'description', 'image', 'class_id'];

    public function class()
    {
        return $this->belongsTo(Kelas::class);
    }
}
