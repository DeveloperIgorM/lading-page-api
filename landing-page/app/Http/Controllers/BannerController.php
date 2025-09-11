<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    
     // Lista todos os banners (admin).
     
    public function index()
    {
        $banners = Banner::orderBy('id', 'desc')->get();
        return view('admin.banners.index', compact('banners'));
    }

 
    public function create()
    {
        return view('banners.create');
    }

    // Novo banner
    public function store(Request $request)
    {
        // Espera input name="image" no form
        $request->validate([
            'image_path'     => 'required|image|mimes:jpg,jpeg,png|max:8192', // 8MB
            'url'  => 'nullable|url',
            'status' => 'nullable|1',
        ]);

        $path = $request->file('image')->store('banners', 'public');

        Banner::create([
            'image_path' => $path,
            'url'   => $request->input('link_url'),
            'status'  => $request->has(1),
        ]);

        return redirect()->route('admin.banners.index')
                         ->with('success', 'Banner criado com sucesso!');
    }

    // editar banner
    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    // atualizar banner
    public function update(Request $request, Banner $banner)
    {
        $request->validate([
            'image_path'     => 'nullable|image|mimes:jpg,jpeg,png|max:8192',
            'url'  => 'nullable|url',
        ]);

        if ($request->hasFile('image_path')) {
            // opcional: remover arquivo antigo
            if ($banner->image_path && Storage::disk('public')->exists($banner->image_path)) {
                Storage::disk('public')->delete($banner->image_path);
            }
            $banner->image_path = $request->file('image_path')->store('banners', 'public');
        }

        $banner->url  = $request->input('url');
        $banner->status = $request->has(1);
        $banner->save();

        return redirect()->route('admin.banners.index')
                         ->with('success', 'Banner atualizado com sucesso!');
    }

    
    // Remove banner.
     
    public function destroy(Banner $banner)
    {
        // remover imagem do storage (opcional)
        if ($banner->image_path && Storage::disk('public')->exists($banner->image_path)) {
            Storage::disk('public')->delete($banner->image_path);
        }

        $banner->delete();

        return redirect()->route('admin.banners.index')
                         ->with('success', 'Banner excluído com sucesso!');
    }
}
