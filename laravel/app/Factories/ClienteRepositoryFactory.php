<?php

namespace App\Factories;

class ClienteRepositoryFactory
{
	private $db;

	public function __construct($db){
		$this->db = $db;
		return $this;
	}

	public function setDb($db)
	{
		$this->db = $db;
		return $this;
	}

	public function make()
	{
		switch ($this->db) {
			case 'eloquent':
				return new \App\Repositories\ClienteEloquentRepository();
				break;
			case 'plain':
				return new \App\Repositories\ClientePlainRepository();
				break;
			case 'builder':
				return new \App\Repositories\ClienteBuilderRepository();
				break;
			default:
				break;
		}
	}
}