<?php

namespace App\Business;

use App\Factories\ClienteRepositoryFactory;

class ClientesBO
{
	public function getAllClients($options=[])
	{
		$db = isset($options['db']) ? $options['db'] : 'eloquent';
		$repo = (new ClienteRepositoryFactory($db))->make(); 
		$todos = $repo->getAll();
		return $todos;
	}
}