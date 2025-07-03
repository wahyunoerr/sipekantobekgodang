<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persyaratan extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function jenisSurats()
    {
        return $this->belongsToMany(JenisSurat::class, 'persyaratan_has_jenis_surat');
    }
}
