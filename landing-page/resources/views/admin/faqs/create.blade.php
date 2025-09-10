@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3>Nova FAQ</h3>

    @if($errors->any())
        <div class="alert alert-danger"><ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul></div>
    @endif

    <form action="{{ route('admin.faqs.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Pergunta</label>
            <input type="text" name="pergunta" class="form-control" value="{{ old('question') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Resposta</label>
            <textarea name="resposta" class="form-control" rows="5" required>{{ old('answer') }}</textarea>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="status" id="status" class="form-check-input" {{ old(1) ? 'checked' : 0 }}>
            <label class="form-check-label" for="status">Ativo</label>
        </div>

        <button class="btn btn-success">Salvar</button>
        <a href="{{ route('admin.faqs.index') }}" class="btn btn-link">Voltar</a>
    </form>
</div>
@endsection
