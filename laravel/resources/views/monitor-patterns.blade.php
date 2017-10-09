<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    </head>
    <body>
        <div class="wrapper">
            <div class="col-md-12">
                <div class="col-md-12">
                    <h1>Benchmark</h1>
                    <p>Driver: {{ config('database.default') . ' / Host: ' . config('database.connections')[config('database.default')]['host']  . ' / Database: ' . 
                    config('database.connections')[config('database.default')]['database']
                    }}</p>
                    <hr>
                </div>
                
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Consulta por Eloquent    
                        </div>
                        <div class="panel-body">
                            <ul class="list-unstyled">
                                <li>Total de registros: {{ $totalRegistrosEloquent }}
                                <li>Tipo de retorno: {{ $tipoRetornoEloquent }}
                                <li>Início: {{ $inicioEloquent }}</li>
                                <li>Final: {{ $finalEloquent }}</li>
                                <li>
                                    <h2 class="text-center">{{ $totalEloquent }}</h2>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <code>
                        <?php var_dump($todosEloquent) ?>
                    </code>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Consulta por Builder    
                        </div>
                        <div class="panel-body">
                            <ul class="list-unstyled">
                                <li>Total de registros: {{ $totalRegistrosBuilder }}
                                <li>Tipo de retorno: {{ $tipoRetornoBuilder }}
                                <li>Início: {{ $inicioBuilder }}</li>
                                <li>Final: {{ $finalBuilder }}</li>
                                <li>
                                    <h2 class="text-center">{{ $totalBuilder }}</h2>
                                </li>
                                <li><?php 
                                        $qtdVezes=round($totalEloquent/$totalBuilder, 2);
                                        echo '<b>' . $qtdVezes . ' vezes</b> mais rápido que Eloquent';
                                    ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <code>
                        <?php var_dump($todosBuilder) ?>
                    </code>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Consulta por PlainSQL    
                        </div>
                        <div class="panel-body">
                            <ul class="list-unstyled">
                                <li>Total de registros: {{ $totalRegistrosPlain }}
                                <li>Tipo de retorno: {{ $tipoRetornoPlain }}
                                <li>Início: {{ $inicioPlain }}</li>
                                <li>Final: {{ $finalPlain }}</li>
                                <li>
                                    <h2 class="text-center">{{ $totalPlain }}</h2>
                                </li>
                                <li><?php 
                                        $qtdVezes=round($totalBuilder/$totalPlain, 2);
                                        echo '<b>' . $qtdVezes . ' vezes</b> mais rápido que QueryBuilder';
                                    ?>
                                </li>
                                <li><?php 
                                        $qtdVezes=round($totalEloquent/$totalPlain, 2);
                                        echo '<b>' . $qtdVezes . ' vezes</b> mais rápido que Eloquent';
                                    ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <code>
                        <?php var_dump($todosPlain) ?>
                    </code>
                </div>
            </div>
        </div>

    </body>
</html>
