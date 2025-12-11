{{-- resources/views/contatos/_form.blade.php --}}
@csrf
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="form-label">Nome *</label>
        <input type="text" name="nome" value="{{ old('nome', $contato->nome ?? '') }}" class="form-control @error('nome') is-invalid @enderror" required>
        @error('nome') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" value="{{ old('email', $contato->email ?? '') }}" class="form-control @error('email') is-invalid @enderror">
        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Telefone</label>
        <input type="text" name="telefone" value="{{ old('telefone', $contato->telefone ?? '') }}" class="form-control @error('telefone') is-invalid @enderror">
        @error('telefone') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-8 mb-3">
        <label class="form-label">Endereço</label>
        <input type="text" name="endereco" value="{{ old('endereco', $contato->endereco ?? '') }}" class="form-control @error('endereco') is-invalid @enderror">
        @error('endereco') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Data de Nascimento</label>
        <input type="date" name="nascimento" value="{{ old('nascimento', isset($contato) && $contato->nascimento ? $contato->nascimento->format('Y-m-d') : '') }}" class="form-control @error('nascimento') is-invalid @enderror">
        @error('nascimento') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-8 mb-3">
        <label class="form-label">Observações</label>
        <textarea name="observacoes" rows="3" class="form-control @error('observacoes') is-invalid @enderror">{{ old('observacoes', $contato->observacoes ?? '') }}</textarea>
        @error('observacoes') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-12 mb-3">
        <label class="form-label">Avatar (opcional)</label>
        @if(isset($contato) && $contato->avatar)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $contato->avatar) }}" alt="avatar" style="max-height:120px; border-radius:6px;">
            </div>
        @endif
        <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror" accept="image/*">
        @error('avatar') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>
</div>
