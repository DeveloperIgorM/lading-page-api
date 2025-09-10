@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>FAQs</h3>
        <a href="{{ route('admin.faqs.create') }}" class="btn btn-primary">Nova FAQ</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr><th>ID</th><th>Pergunta</th><th>Ativo</th><th>Ações</th></tr>
        </thead>
        <tbody>
            @forelse($faqs as $f)
            <tr>
                <td>{{ $f->id }}</td>
                <td>{{ $f->pergunta }}</td>
                <td>{{ $f->status ? 1 : 0 }}</td>
                <td>
                    <a href="{{ route('admin.faqs.edit', $f) }}" class="btn btn-sm btn-secondary">Editar</a>
                    <form action="{{ route('admin.faqs.destroy', $f) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Excluir FAQ?')">Apagar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="4">Nenhuma FAQ cadastrada.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
