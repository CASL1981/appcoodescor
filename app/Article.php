<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    //modelo de articulos

    use SoftDeletes;

    protected $table = "articles";

    protected $fillable = ['name', 'unidad', 'marca', 'costo', 'tasa', 'acreedor_id'];

    protected $dates = ['deleted_at'];

    public function Creditor(){

    	return $this->belongsTo(Creditor::class);
    }


    public function setNameAttribute($value){
    	$this->attributes['name'] = strtoupper($value);
    }

    public function setUnidadAttribute($value){
    	$this->attributes['unidad'] = strtoupper($value);
    }

    public function setMarcaAttribute($value){
    	$this->attributes['marca'] = strtoupper($value);
    }
}
