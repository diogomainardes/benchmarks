<?php

namespace App\Repositories;

use App\Interfaces\ClienteRepositoryInterface;
use App\Cliente;

class ClienteEloquentRepository implements ClienteRepositoryInterface
{
	public function getAll($options=[])
	{
		return Cliente::all();
	}

	public function getAllWithAddress($options=[])
	{
		return Cliente::with('endereco')->get();
	}
}
