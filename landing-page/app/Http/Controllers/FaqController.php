<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    
    // Lista as FAQs (admin).
     
    public function index()
    {
        $faqs = Faq::orderBy('id','desc')->get();
        return view('admin.faqs.index', compact('faqs'));
    }


    // Formulário para criar FAQ.
     
    public function create()
    {
        return view('admin.faqs.create');
    }

    
    // Armazena FAQ.
     
    public function store(Request $request)
    {
        $request->validate([
            'pergunta'  => 'required|string|max:255',
            'resposta'    => 'required|string',
            'is_active' => 'nullable|1',
        ]);

        Faq::create([
            'pergunta'  => $request->input('pergunta'),
            'resposta'    => $request->input('resposta'),
            'status' => $request->has(1),
        ]);

        return redirect()->route('admin.faqs.index')
                         ->with('success', 'FAQ criada com sucesso!');
    }

    
    // Form de edição.
     
    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    
    // Atualiza FAQ.
     
    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'perfunta'  => 'required|string|max:255',
            'resposta'    => 'required|string',
            'status' => 'required|1'
        ]);

        $faq->pergunta  = $request->input('pergunta');
        $faq->resposta    = $request->input('resposta');
        $faq->status = $request->has(1);
        $faq->save();

        return redirect()->route('admin.faqs.index')
                         ->with('success', 'FAQ atualizada com sucesso!');
    }

    
    // Remove FAQ.
    
    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faqs.index')
                         ->with('success', 'FAQ excluída com sucesso!');
    }
}
