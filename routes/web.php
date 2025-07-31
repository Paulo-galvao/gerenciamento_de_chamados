<?php

use App\Http\Controllers\chamadoController;
use App\Models\Chamado;
use App\Models\Status;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Number;

Route::get('/', [chamadoController::class, 'index']);
Route::get('/show/{id}', [chamadoController::class, 'show']);
Route::get('/create', [chamadoController::class, 'create']);
Route::post('/store', [chamadoController::class, 'store']);
Route::patch('/update/{id}', [chamadoController::class, 'update']);
Route::delete('/destroy/{id}', [chamadoController::class, 'destroy']);

Route::get('/sla', function() {

    $resolvedThisMonth = 0; // variavel que vai receber total de chamados resolvidos este mes 
    $totalThisMonth = 0; // ira receber total de chamdos abertos no mes
    $currentMonth = Carbon::now()->month; // mes atual
    $chamados = Chamado::all(); // todos so chamados
    $chamadosResolved = Status::find(3)->chamados()->get(); // todos os chamdos resolvidos

    // $limit = $chamados->first()->limit < $chamados->first()->resolved;
    // dd($chamados->first()->limit->month);

    if($chamados->count() === 0) {
        dd("Nenhum chamado registrado");
    }
    


    // logica para calcular todos os chamdos resolvidos no mes
    foreach( $chamadosResolved as $chamado ) {
        if(
            Carbon::parse($chamado->resolved)->month === $currentMonth
            && $chamado->limit > $chamado->resolved
            ) {
            $resolvedThisMonth += 1;
        }
    }

    // logica para calcular total de chamados no mes
    foreach( $chamados as $chamado ) {
        if(Carbon::parse($chamado->resolved)->month === $currentMonth) {
            $totalThisMonth += 1;
        }
    }

    if($totalThisMonth === 0) {
        dd("Nenhum chamado registrado nesse mês");
    }

    $percentage = ($resolvedThisMonth / $totalThisMonth) * 100;
    $percentage = Number::format($percentage, precision: 2);

    dd($percentage);
    
    return view('sla');
});