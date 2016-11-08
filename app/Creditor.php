<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Creditor extends Model
{
	//modelo de acreedores
	protected $table = "creditors";

    protected $fillable = ['nit', 'name', 'formapago', 'plazo'];

    public function Articles(){

    	return $this->hasMany(Article::class);
    }
}
