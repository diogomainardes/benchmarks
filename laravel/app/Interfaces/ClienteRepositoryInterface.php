<?php

namespace App\Interfaces;

interface ClienteRepositoryInterface
{
	public function getAll($options=[]);
	public function getAllWithAddress($options=[]);
}