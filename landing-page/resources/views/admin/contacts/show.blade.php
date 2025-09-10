@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h3>Contato #{{ $contact->id }}</h3>

    <div class="card mb-3">
        <div class="card-body">
            <p><strong>Nome:</strong> {{ $contact->name }}</p>
            <p><strong>Email:</strong> {{ $contact->email }}</p>
            <p><strong>Telefone:</strong> {{ $contact->phone }}</p>
            <p><strong>Mensagem:</strong><br>{{ $contact->message }}</p>
            <p><strong>Recebido em:</strong> {{ $contact->created_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    <a href="{{ route('admin.contacts.index') }}" class="btn btn-link">Voltar</a>
</div>
@endsection
