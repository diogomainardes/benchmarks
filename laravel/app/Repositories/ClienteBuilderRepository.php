<?php

namespace App\Repositories;

use App\Interfaces\ClienteRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ClienteBuilderRepository implements ClienteRepositoryInterface
{
	public function getAll($options=[])
	{
		return DB::table('clientes')->get();
	}

	public function getAllWithAddress($options=[])
	{
		$clientes = DB::table('clientes')
						->join('enderecos', 'clientes.id', '=', 'enderecos.id_cliente')
						->get();

		return $clientes;
	}
}
