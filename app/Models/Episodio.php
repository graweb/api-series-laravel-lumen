<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model
{
    protected $fillable = ['temporada', 'numero', 'assistido', 'serie_id'];
    public $timestamps = false;
    protected $appends = ['links'];

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }

    public function getAssistidoAttribute($assistido): bool
    {
        return $assistido;
    }

    public function getLinksAttribute(): array
    {
        return [
            'self' => '/api/episodios/'. $this->id,
            'serie' => '/api/series/'. $this->serie_id
        ];
    }
}
