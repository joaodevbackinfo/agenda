<x-app-layout>
<div class="card shadow-sm p-4">

    <h2 class="mb-3">➕ Novo Contato</h2>

    <form action="{{ route('contatos.store') }}" method="POST">
        @csrf

        <div class="row g-3">

            <div class="col-md-6">
                <label class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control">
            </div>

            <div class="col-md-4">
                <label class="form-label">Telefone</label>
                <input type="text" name="telefone" class="form-control">
            </div>

            <div class="col-md-4">
                <label class="form-label">Endereço</label>
                <input type="text" name="endereco" class="form-control">
            </div>

            <div class="col-md-4">
                <label class="form-label">Nascimento</label>
                <input type="date" name="nascimento" class="form-control">
            </div>

            <div class="col-12">
                <label class="form-label">Observações</label>
                <textarea name="observacoes" class="form-control"></textarea>
            </div>
        </div>

        <div class="mt-4">
            <button class="btn btn-primary">Salvar</button>
            <a href="{{ route('contatos.index') }}" class="btn btn-secondary">Voltar</a>
        </div>

    </form>

</div>
</x-app-layout>
