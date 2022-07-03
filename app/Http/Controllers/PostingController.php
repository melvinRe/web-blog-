<?php

namespace App\Http\Controllers;

use App\Models\Posting;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostingController extends Controller
{
    public function index()
    {
        $data = Posting::all();

        return view('posting.index', compact('data'));
    }

    public function add()
    {
        $user = User::orderBY('name')->get();
        
        return view('posting.add', compact('user'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // // $request->validate([
        // //     'judul' => 'required',
        // //     'topik' => 'required',
        // //     'gambar' => 'required',
        // //     'isi' => 'required',
        // ]);

        try {
            $pathgambar = $request->file('gambar')->store('posting-images');

            Posting::create([
                'judul' => $request->judul,
                'topik' => $request->topik,
                'gambar' => $pathgambar,
                'isi' => $request->isi,
                'preview' => $request->preview,
                'user_id' => Auth::user()->id
            ]);

            return redirect('posting');
        } catch (Exception $error) {
            return redirect()->back()->with([
                'failed' => $error->getMessage()
            ]);
        }
    }

    public function edit($id)
    {
        $user = User::orderBY('email')->get();

        $data = Posting::find($id);
        return view('posting.edit', compact('user','data'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        try {
            $posting = Posting::find($request->id);
            
            if ($request->file('gambar')) {
                // dd($request->all());
                if ($posting->gambar) {
                    Storage::delete($posting->gambar);
                }
                $pathgambar = $request->file('gambar')->store('posting-images');

                Posting::where('id', $request->id)->update([
                    'user_id' => Auth::user()->id,
                    'judul' => $request->judul,
                    'topik' => $request->topik,
                    'gambar' => $pathgambar,
                    'isi' => $request->isi,
                    'preview' => $request->preview
                ]);
            } else {
                Posting::where('id', $request->id)->update([
                    'user_id' => Auth::user()->id,
                    'judul' => $request->judul,
                    'topik' => $request->topik,
                    'isi' => $request->isi,
                    'preview' => $request->preview,
                ]);               
            }
            return redirect('posting');
        } catch (Exception $error) {
            return redirect()->back()->with(['failed'=> $error->getMessage(),
        ]);
        }
    }

    public function delete($id)
    {
        try {
            $posting = Posting::find($id);

            if ($posting->gambar) {
                Storage::delete($posting->gambar);
            }
            Posting::destroy($id);

            return redirect('posting');
        } catch (Exception $error) {
            return redirect()->back()->with([
                'failed' => $error->getMessage()
            ]);
        }
    }
}
