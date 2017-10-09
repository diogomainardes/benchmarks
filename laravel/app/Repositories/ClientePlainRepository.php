<?php

namespace App\Repositories;

use App\Interfaces\ClienteRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ClientePlainRepository implements ClienteRepositoryInterface
{
	public function getAll($options=[])
	{
		return DB::select('select * from clientes');
	}

	public function getAllWithAddress($options=[])
	{
		$clientes = DB::select('select * 
								  from clientes c');

		

		return ;
	}
}
