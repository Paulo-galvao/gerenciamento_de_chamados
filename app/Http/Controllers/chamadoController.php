<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Chamado;
use App\Models\Status;

use Carbon\Carbon;
use Illuminate\Support\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class chamadoController extends Controller
{
    public function index()
    {
        $resolvedThisMonth = 0; // variavel que vai receber total de chamados resolvidos este mes 
        $totalThisMonth = 0; // ira receber total de chamdos abertos no mes
        $currentMonth = Carbon::now()->month; // mes atual
        $chamados = Chamado::all(); // todos so chamados
        $chamadosResolved = Status::find(3)->chamados()->get(); // todos os chamdos resolvidos
        $message = '';
        $percentage = 0;

        // logica para calcular todos os chamados resolvidos no mes
        // se o chamado foi aberto mes passado e resolvido esse mes, mas
        // ainda dentro do prazo, conta como resolvido este mes
        foreach ($chamadosResolved as $chamado) {
            if (Carbon::parse($chamado->resolved)->month === $currentMonth
                && $chamado->limit > $chamado->resolved // resolvido dentro do prazo
            ) {
                $resolvedThisMonth += 1;
            }
        }

        // logica para calcular total de chamados no mes
        foreach ($chamados as $chamado) {
            if (Carbon::parse($chamado->created_at)->month === $currentMonth) {
                $totalThisMonth += 1;
            }
        }

        if ($totalThisMonth === 0) {
            $message = "Nenhum chamado registrado nesse mês";
        } else {
            $percentage = ($resolvedThisMonth / $totalThisMonth) * 100;
            $percentage = Number::format($percentage, precision: 2);
        }

        if ($chamados->count() === 0) {
            $message = "Nenhum chamado registrado";
        } 

        return view('home', [
            'chamados' => $chamados, 
            'percentage' => $percentage,
            'message' => $message,
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('create', ['categories' => $categories]);
    }

    public function show($id)
    {
        $chamado = Chamado::find($id);
        $statuses = Status::all();
        return view('show', [
            'chamado' => $chamado,
            'statuses' => $statuses,
        ]);
    }

    public function store(Request $request)
    {
        $categoryId = 0;
        $categories = Category::all();

        request()->validate([
            'title' => ['required'],
            'description' => ['required'],
            'category' => ['required', Rule::in(['TI', 'Secretaria', 'RH'])],
        ]);

        

        foreach ($categories as $category) {
            if(request('category') === $category->name) {
                $categoryId = $category->id;
            }
        }

        Chamado::create([
            'title' => request('title'),
            'description' => request('description'),
            'category_id' => $categoryId,
            'status_id' => 1,
            'limit' => now()->addDays(3),
            'resolved' => ""
        ]);

        return redirect('/');
    }

    public function update($id)
    {
        $statusId = 0;
        $resolved = '';
        $chamado = Chamado::findOrFail($id);
        
        if (request('status') === 'Pendente') {
            $statusId = 2;
            $resolved = '';
        } else if (request('status') === 'Resolvido') {
            $statusId = 3;
            $resolved = Carbon::now();
        }

        $chamado->update([
            'status_id' => $statusId,
            'resolved' => $resolved,
        ]);

        return redirect('/');
    }

    public function destroy($id)
    {
        $chamado = Chamado::findOrFail($id);
        $chamado->delete();
        return redirect('/');
    }
}
