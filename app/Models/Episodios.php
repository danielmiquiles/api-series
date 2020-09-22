<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Episodios extends Model
{
    public $timestamps = false;
    public $fillable = ['temporada','numero','assitido','serie_id'];
    public function serie()
    {
        return $this->belongTo(Series::class);
    }

}
