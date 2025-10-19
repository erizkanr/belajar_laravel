<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tas extends Model
    {
        use HasFactory;

        protected $table = 'tas';

        protected $fillable = [
        'nama',
        'merk',
        'harga',
        'foto',
        'kategori_tas_id'
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriTas::class, 'kategori_tas_id');
    }
}