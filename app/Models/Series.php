<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    public $timestamps = false;
    public $fillable = ['nome'];
    protected $perPage = 5;
    protected $appends = ['links'];

    public function episodios()
    {
        return $this->hasMany(Episodios::class);
    }

    public function getLinksAttribute(): array
    {
        return [
            'self' => '/api/series/'.$this->id,
            'episodios' => '/api/series/'.$this->id.'/episodios'
        ];
    }

}
