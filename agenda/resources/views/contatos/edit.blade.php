<x-app-layout>
<div class="card shadow-sm p-4">

    <h2 class="mb-3">✏️ Editar Contato</h2>

    <form action="{{ route('contatos.update', $contato) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row g-3">

            <div class="col-md-6">
                <label class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" value="{{ $contato->nome }}" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ $contato->email }}">
            </div>

            <div class="col-md-4">
                <label class="form-label">Telefone</label>
                <input type="text" name="telefone" class="form-control" value="{{ $contato->telefone }}">
            </div>

            <div class="col-md-4">
                <label class="form-label">Endereço</label>
                <input type="text" name="endereco" class="form-control" value="{{ $contato->endereco }}">
            </div>

            <div class="col-md-4">
                <label class="form-label">Nascimento</label>
                <input type="date" name="nascimento" class="form-control" value="{{ $contato->nascimento }}">
            </div>

            <div class="col-12">
                <label class="form-label">Observações</label>
                <textarea name="observacoes" class="form-control">{{ $contato->observacoes }}</textarea>
            </div>

        </div>

        <div class="mt-4">
            <button class="btn btn-primary">Salvar</button>
            <a href="{{ route('contatos.index') }}" class="btn btn-secondary">Voltar</a>
        </div>

    </form>

</div>
</x-app-layout>
