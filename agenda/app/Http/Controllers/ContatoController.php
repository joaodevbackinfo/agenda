<?php

namespace App\Http\Controllers;

use App\Models\Contato;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ContatoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // protege todas as rotas
    }

    public function index(Request $request)
    {
        $user = $request->user();

        // filtros
        $query = $user->contatos(); // ✔ CORRETO — remove o erro

        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(function ($qw) use ($q) {
                $qw->where('nome', 'like', "%{$q}%")
                    ->orWhere('email', 'like', "%{$q}%")
                    ->orWhere('telefone', 'like', "%{$q}%");
            });
        }

        if ($request->filled('nascimento_de')) {
            $query->where('nascimento', '>=', $request->input('nascimento_de'));
        }

        if ($request->filled('nascimento_ate')) {
            $query->where('nascimento', '<=', $request->input('nascimento_ate'));
        }

        // ordenação
        $sort = $request->input('sort', 'nome');
        $direction = $request->input('dir', 'asc');

        $contatos = $query->orderBy($sort, $direction)
                          ->paginate(10)
                          ->withQueryString();

        return view('contatos.index', compact('contatos'));
    }

    public function create()
    {
        return view('contatos.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'telefone' => 'nullable|string|max:30',
            'endereco' => 'nullable|string|max:500',
            'nascimento' => 'nullable|date',
            'observacoes' => 'nullable|string',
            'avatar' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = $path;
        }

        $data['user_id'] = $request->user()->id;

        Contato::create($data);

        return redirect()->route('contatos.index')->with('success', 'Contato criado.');
    }

    public function show(Contato $contato)
    {
        // Garante que o contato pertence ao usuário logado
        if ($contato->user_id !== Auth::id()) {
            abort(403);
        }

        return view('contatos.show', compact('contato'));
    }

    public function edit(Contato $contato)
    {
        if ($contato->user_id !== Auth::id()) {
            abort(403);
        }

        return view('contatos.edit', compact('contato'));
    }

    public function update(Request $request, Contato $contato)
    {
        if ($contato->user_id !== Auth::id()) {
            abort(403);
        }

        $data = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'telefone' => 'nullable|string|max:30',
            'endereco' => 'nullable|string|max:500',
            'nascimento' => 'nullable|date',
            'observacoes' => 'nullable|string',
            'avatar' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('avatar')) {
            if ($contato->avatar) {
                Storage::disk('public')->delete($contato->avatar);
            }
            $path = $request->file('avatar')->store('avatars', 'public');
            $data['avatar'] = $path;
        }

        $contato->update($data);

        return redirect()->route('contatos.index')->with('success', 'Contato atualizado.');
    }

    public function destroy(Contato $contato)
    {
        if ($contato->user_id !== Auth::id()) {
            abort(403);
        }

        if ($contato->avatar) {
            Storage::disk('public')->delete($contato->avatar);
        }

        $contato->delete();

        return redirect()->route('contatos.index')->with('success', 'Contato excluído.');
    }
}
