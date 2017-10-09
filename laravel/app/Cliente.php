<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
	public function enderecos()
    {
        return $this->hasMany('App\Endereco', 'id_cliente');
    }
    
}
