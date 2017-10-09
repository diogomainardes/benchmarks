<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use Illuminate\Support\Facades\DB;
use App\Business\ClientesBO;


class MonitorController extends Controller
{
    public function orm(Request $request)
    {
    	
    	$init = microtime(true);
    	echo "Inicio -> " . $init . "<br>";
    	$todos = Cliente::all();
    	$final = microtime(true);
    	echo "Total -> " . ($final - $init) . "<br><hr>";
		
    	$init = microtime(true);
    	echo "Inicio -> " . $init . "<br>";
    	$todos = DB::table('clientes')->get();
    	$final = microtime(true);
    	echo "Total -> " . ($final - $init) . "<br><hr>";

    	$init = microtime(true);
    	echo "Inicio -> " . $init . "<br>";
    	$todos = DB::select('select * from clientes');
    	$final = microtime(true);
    	echo "Total -> " . ($final - $init) . "<br><hr>";
    	
    }

    public function withPatterns(Request $request)
    {
        $dadosView = [];
        $bo = new ClientesBO();

    	$dadosView['inicioEloquent'] = microtime(true);
    	$todos = $bo->getAllClients(array('db' => 'eloquent'));
        $dadosView['finalEloquent'] = microtime(true);

        $dadosView['tipoRetornoEloquent'] = get_class($todos);
    	$dadosView['totalEloquent'] = ($dadosView['finalEloquent'] - $dadosView['inicioEloquent']);
        $dadosView['totalRegistrosEloquent'] = $todos->count();
        $dadosView['todosEloquent'] = $todos;

        //Inicio da contagem via QueryBuilder
        $dadosView['inicioBuilder'] = microtime(true);
    	$todos = $bo->getAllClients(array('db' => 'builder'));
        $dadosView['finalBuilder'] = microtime(true);

    	$dadosView['tipoRetornoBuilder'] = get_class($todos);
        $dadosView['totalBuilder'] = ($dadosView['finalBuilder'] - $dadosView['inicioBuilder']);
        $dadosView['totalRegistrosBuilder'] = $todos->count();
        $dadosView['todosBuilder'] = $todos;

        //Inicio de contagem via PlainSQL
    	$dadosView['inicioPlain'] = microtime(true);
        $todos = $bo->getAllClients(array('db' => 'plain'));
        $dadosView['finalPlain'] = microtime(true);

        $dadosView['tipoRetornoPlain'] = gettype($todos);
        $dadosView['totalPlain'] = ($dadosView['finalPlain'] - $dadosView['inicioPlain']);
        $dadosView['totalRegistrosPlain'] = count($todos);
        $dadosView['todosPlain'] = $todos;

        return view('monitor-patterns', $dadosView);

    }


    public function relationships(Request $request)
    {
        $dadosView = [];
        $bo = new ClientesBO();

        $dadosView['inicioEloquent'] = microtime(true);
        $todos = $bo->getAllClientsWithAddress(array('db' => 'eloquent'));
        $dadosView['finalEloquent'] = microtime(true);

        $dadosView['tipoRetornoEloquent'] = get_class($todos);
        $dadosView['totalEloquent'] = ($dadosView['finalEloquent'] - $dadosView['inicioEloquent']);
        $dadosView['totalRegistrosEloquent'] = $todos->count();
        $dadosView['todosEloquent'] = $todos;

        //Inicio da contagem via QueryBuilder
        $dadosView['inicioBuilder'] = microtime(true);
        $todos = $bo->getAllClientsWithAddress(array('db' => 'builder'));
        $dadosView['finalBuilder'] = microtime(true);

        $dadosView['tipoRetornoBuilder'] = get_class($todos);
        $dadosView['totalBuilder'] = ($dadosView['finalBuilder'] - $dadosView['inicioBuilder']);
        $dadosView['totalRegistrosBuilder'] = $todos->count();
        $dadosView['todosBuilder'] = $todos;

        //Inicio de contagem via PlainSQL
        $dadosView['inicioPlain'] = microtime(true);
        $todos = $bo->getAllClientsWithAddress(array('db' => 'plain'));
        $dadosView['finalPlain'] = microtime(true);

        $dadosView['tipoRetornoPlain'] = gettype($todos);
        $dadosView['totalPlain'] = ($dadosView['finalPlain'] - $dadosView['inicioPlain']);
        $dadosView['totalRegistrosPlain'] = count($todos);
        $dadosView['todosPlain'] = $todos;

        return view('monitor-patterns', $dadosView);

    }




}
