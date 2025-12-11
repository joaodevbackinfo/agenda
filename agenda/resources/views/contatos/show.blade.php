<x-app-layout>
<div class="card shadow-sm p-4">

    <h2 class="mb-3">👤 Detalhes do Contato</h2>

    <div class="mb-2"><strong>Nome:</strong> {{ $contato->nome }}</div>
    <div class="mb-2"><strong>Email:</strong> {{ $contato->email }}</div>
    <div class="mb-2"><strong>Telefone:</strong> {{ $contato->telefone }}</div>
    <div class="mb-2"><strong>Endereço:</strong> {{ $contato->endereco }}</div>
    <div class="mb-2">
        <strong>Nascimento:</strong>
        {{ $contato->nascimento ? \Carbon\Carbon::parse($contato->nascimento)->format('d/m/Y') : '—' }}
    </div>
    <div class="mb-2"><strong>Observações:</strong> {{ $contato->observacoes }}</div>

    <div class="mt-4">
        <a href="{{ route('contatos.index') }}" class="btn btn-secondary">Voltar</a>
        <a href="{{ route('contatos.edit', $contato) }}" class="btn btn-primary">Editar</a>
    </div>

</div>
</x-app-layout>
