@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>Banners</h3>
        <a href="{{ route('admin.banners.create') }}" class="btn btn-primary">Novo banner</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Imagem</th>
                <th>Link</th>
                <th>Ativo</th>
                <th>Criado</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($banners as $b)
            <tr>
                <td>{{ $b->id }}</td>
                <td style="width:150px;">
                    @if($b->image_path)
                        <img src="{{ asset('storage/'.$b->image_path) }}" alt="" class="img-fluid" style="max-height:70px;">
                    @endif
                </td>
                <td>
                    @if($b->url)
                        <a href="{{ $b->url }}" target="_blank">Abrir</a>
                    @endif
                </td>
                <td>{{ $b->status ? 1 : 0}}</td>
                <td>{{ $b->created_at->format('d/m/Y') }}</td>
                <td>
                    <a href="{{ route('admin.banners.edit', $b) }}" class="btn btn-sm btn-secondary">Editar</a>

                    <form action="{{ route('admin.banners.destroy', $b) }}" method="POST" style="display:inline-block;"
                          onsubmit="return confirm('Excluir este banner?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Apagar</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="7">Nenhum banner encontrado.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
