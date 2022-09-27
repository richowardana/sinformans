<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisBantuan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function DetailBantuan()
    {
        return $this->hasMany(DetailBantuan::class);
    }
}
