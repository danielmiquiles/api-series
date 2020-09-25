<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Episodios extends Model
{
    public $timestamps = false;
    public $fillable = ['temporada','numero','assitido','serie_id'];
    protected $appends = ['links'];

    public function serie()
    {
        return $this->belongTo(Series::class);
    }

    public function getAssistidoAttribute($assistido): bool
    {
        return $assistido;
    }

    public function getLinksAttribute(): array
    {
        return [
            'self' => '/api/episodios/'.$this->id,
            'serie' => '/api/series/'.$this->serie_id
        ];
    }

}
