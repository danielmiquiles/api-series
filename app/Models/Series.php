<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    public $timestamps = false;
    public $fillable = ['nome'];

    public function episodios()
    {
        return $this->hasMany(Episodios::class);
    }

}
