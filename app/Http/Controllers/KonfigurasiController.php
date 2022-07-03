<?php

namespace App\Http\Controllers;

use App\Models\Konfigurasi;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KonfigurasiController extends Controller
{
    public function index()
    {
        $data = Konfigurasi::all();

        return view('konfigurasi.index', compact('data'));
    }
    
    public function add()
    {
        $user = User::orderBY('name')->get();
        
        return view('konfigurasi.add', compact('user'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'gambar' => 'required',
            'about' => 'required',
            'contact' => 'required',
        ]);

        try {
            $pathgambar = $request->file('gambar')->store('konfigurasi-images');

            Konfigurasi::create([
                'gambar' => $pathgambar,
                'about' => $request->about,
                'contact' => $request->contact,
                
            ]);

            return redirect('konfigurasi');
        } catch (Exception $error) {
            return redirect()->back()->with([
                'failed' => $error->getMessage()
            ]);
        }
    }

    public function edit($id)
    {
        $user = User::orderBY('email')->get();

        $data = Konfigurasi::find($id);
        return view('konfigurasi.edit', compact('user','data'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        try {
            $konfigurasi = Konfigurasi::find($request->id);
            
            if ($request->file('gambar')) {
                // dd($request->all());
                if ($konfigurasi->gambar) {
                    Storage::delete($konfigurasi->gambar);
                }
                $pathgambar = $request->file('gambar')->store('konfigurasi-images');

                Konfigurasi::where('id', $request->id)->update([
                    'gambar' => $pathgambar,
                    'about' => $request->about,
                    'contact' => $request->contact,
                ]);
                // dd($request->all());
            } else {
                Konfigurasi::where('id', $request->id)->update([
                    'about' => $request->about,
                    'contact' => $request->contact,
                ]);               
            }
            return redirect('konfigurasi');
        } catch (Exception $error) {
            return redirect()->back()->with(['failed'=> $error->getMessage(),
        ]);
        }
    }

    public function delete($id)
    {
        try {
            $konfigurasi = Konfigurasi::find($id);

            if ($konfigurasi->gambar) {
                Storage::delete($konfigurasi->gambar);
            }
            Konfigurasi::destroy($id);

            return redirect('konfigurasi');
        } catch (Exception $error) {
            return redirect()->back()->with([
                'failed' => $error->getMessage()
            ]);
        }
    }
}
