<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'form_id'];

    public static function boot()
    {
        parent::boot();

        static::deleting(function ($jenisSurat) {
            $jenisSurat->persyaratans()->detach();
        });
    }

    public function persyaratans()
    {
        return $this->belongsToMany(Persyaratan::class, 'persyaratan_has_jenis_surat');
    }

    public function form()
    {
        return $this->belongsTo(JenisForm::class, 'form_id');
    }
}
