@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3>Contatos</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead><tr><th>ID</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Recebido</th><th>Ações</th></tr></thead>
        <tbody>
            @forelse($contacts as $c)
            <tr>
                <td>{{ $c->id }}</td>
                <td>{{ $c->nome }}</td>
                <td>{{ $c->email }}</td>
                <td>{{ $c->telefone }}</td>
                <td>{{ $c->created_at->format('d/m/Y H:i') }}</td>
                <td>
                    <a href="{{ route('admin.contacts.show', $c) }}" class="btn btn-sm btn-primary">Ver</a>

                    <form action="{{ route('admin.contacts.destroy', $c) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Remover contato?')">Remover</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="6">Nenhum contato encontrado.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
