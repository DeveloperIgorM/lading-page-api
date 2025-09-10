<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    
    // Lista contatos (admin).
     
    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->get();
        return view('admin.contacts.index', compact('contacts'));
    }

    
    // Mostra um contato (admin).
    
    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    
     //  Rota pública para gravação do formulário de contato da landing.
     // Use POST /contato -> ContactController@store
     
    public function store(Request $request)
    {
        $request->validate([
            'nome'            => 'required|string|max:255',
            'email'           => 'nullable|email|max:255',
            'telefone'           => 'nullable|string|max:50',
        ]);

        $contact = Contact::create([
            'nome'           => $request->input('name'),
            'email'          => $request->input('email'),
            'telefone'          => $request->input('phone'),
        ]);

        // Retornar para landing com mensagem de sucesso
        return redirect()->back()->with('success', 'Solicitação enviada com sucesso!');
    }

    
    // Remove um contato (admin).
     
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('admin.contacts.index')
                         ->with('success', 'Contato removido com sucesso!');
    }
}
