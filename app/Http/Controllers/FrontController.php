<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Konfigurasi;
use App\Models\Posting;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class FrontController extends Controller
{ //function index untuk menampilkan seluruh berita
    public function index()
    {
        $data = Posting::with(['user'])->orderBy('created_at','DESC')->get();

        return view('welcome', compact('data'));
    }

    // untuk menamoilkan detail berita 
    public function single($id)
    {
        $data = Posting::find($id);

        $user = User::find($id);

        return view('single', compact('data','user'));
    }

    // funtion untuk about

    public function about()
    {
        $data = Konfigurasi::first();

        return view('about', compact('data'));
    }

    public function kontak()
    {
        $data = Contact::first();

        return view('kontak', compact('data'));
    }


   

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'message' => 'required'
        ]);

        try {

            Contact::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'message' => $request->message,
                
            ]);

            return redirect('kontak')->with([
                'success' => "behasil"
            ]);
        } catch (Exception $error) {
            return redirect()->back()->with([
                'failed' => $error->getMessage()
            ]);
        }
    }

    public function topik()
    {
        $data = Posting::groupBy('topik')->get();
        // dd($data);
        return view('topic', compact('data'));
    }

    public function spesifik($topik)
    {
        $data = Posting::with(['user'])->where('topik',$topik)->orderBy('created_at','DESC')->get();
       // $post = $data->get();

        $konfigurasi = Konfigurasi::first();
        $topik = Posting::with(['user'])->groupBy('topik')->orderBy('created_at','DESC')->get();

        return view('spesifik', compact('konfigurasi','topik', 'data'));
    }

    public function recent()
    {
        $data = Posting::with(['user'])->orderBy('created_at','DESC')->get();
       // $post = $data->get();

        $konfigurasi = Konfigurasi::first();
        // $recent = Posting::with(['user'])->orderBy('created_at','DESC')->get();

        return view('recent', compact('konfigurasi','data'));
    }

    public function archive()
    {
        
    }
}