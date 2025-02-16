<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use App\Models\Usuario;
use App\Models\Statu;
use Illuminate\Http\Request;

class TarefaController extends Controller
{
    public function index()
    {
        $usuarioId = auth()->id();

        $tarefas = Tarefa::with(['usuario', 'responsavel', 'status'])
            ->where('usuario_id', $usuarioId)
            ->orWhere('responsavel_id', $usuarioId)
            ->orderBy('prazo', 'ASC')
            ->get();

        $tarefasPorStatus = [
            'a_fazer' => $tarefas->where('status_id', 1),
            'em_progresso' => $tarefas->where('status_id', 2),
            'concluidas' => $tarefas->where('status_id', 3),
        ];

        return view('dashboard', compact('tarefasPorStatus'));
    }


    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status_id' => 'required|exists:status,id',
        ]);

        $tarefa = Tarefa::findOrFail($id);
        $tarefa->update(['status_id' => $request->status_id]);

        return response()->json(['success' => true]);
    }

    public function create()
    {
        $usuarios = Usuario::all();
        $status = Statu::all();
        return view('create', compact('usuarios', 'status'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:255',
            'descricao' => 'nullable',
            'prazo' => 'nullable|date',
            'responsavel_id' => 'nullable|email',
            'status_id' => 'required|exists:status,id',
        ]);
        

        $responsavel = null;
        if ($request->responsavel_id != null) {
            $responsavel = Usuario::where('email', $request->responsavel_id)->first();
        
            if (!$responsavel) {
                return redirect()->back()->withErrors(['responsavel_id' => 'E-mail do responsável não encontrado.']);
            }
        }

        $responsavel_id = $responsavel ? $responsavel->id : auth()->id();

        Tarefa::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'prazo' => $request->prazo,
            'usuario_id' => auth()->id(),
            'responsavel_id' => $responsavel_id,
            'status_id' => $request->status_id,
        ]);

        return redirect()->route('dashboard')->with('success', 'Tarefa criada com sucesso!');
    }


    public function show(Tarefa $tarefa)
    {
        return view('tarefas.show', compact('tarefa'));
    }

    public function edit(Request $request)
    {
        $id = $request->query('id');

        if (!$id) {
            return redirect()->route('dashboard')->with('error', 'ID da tarefa não informado.');
        }

        $tarefa = Tarefa::find($id);

        if (!$tarefa) {
            return redirect()->route('dashboard')->with('error', 'Tarefa não encontrada.');
        }

        $status = Statu::all();
        $usuarioLogado = auth()->user();
        $podeEditarResponsavel = $tarefa->usuario_id === $usuarioLogado->id;

        return view('edit', compact('tarefa', 'status', 'podeEditarResponsavel'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'prazo' => 'nullable|date',
            'status_id' => 'required|exists:status,id',
        ]);

        $tarefa = Tarefa::findOrFail($id);
        $tarefa->titulo = $request->titulo;
        $tarefa->descricao = $request->descricao;
        $tarefa->prazo = $request->prazo;
        $tarefa->status_id = $request->status_id;

        if ($request->responsavel_id) {
            $responsavel = Usuario::where('email', $request->responsavel_id)->first();
            if ($responsavel) {
                $tarefa->responsavel_id = $responsavel->id;
            }
        }

        $tarefa->save();

        return redirect()->route('dashboard')->with('success', 'Tarefa atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        $tarefa->delete();

        return redirect()->route('dashboard')->with('success', 'Tarefa excluída com sucesso.');

    }
}
