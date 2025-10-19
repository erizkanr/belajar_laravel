<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriTas extends Model
{
    protected $table = 'kategori_tas';
    
    protected $fillable = ['nama']; 

    public function tass(): HasMany
    {
        return $this->hasMany (Tas::class, 'kategori_tas_id'); 
    }
}