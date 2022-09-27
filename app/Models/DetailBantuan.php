<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailBantuan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Keluarga()
    {
        return $this->belongsTo(Keluarga::class);
    }
    public function JenisBantuan()
    {
        return $this->belongsTo(JenisBantuan::class);
    }
}
