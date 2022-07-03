<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function index()
    {
        $data = Contact::all();

        return view('contact.index', compact('data'));
    }

    public function add()
    {
        $user = User::orderBY('name')->get();
        
        return view('contact.add', compact('user'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
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

            return redirect('contact');
        } catch (Exception $error) {
            return redirect()->back()->with([
                'failed' => $error->getMessage()
            ]);
        }
    }

    public function edit($id)
    {
        $user = User::orderBY('email')->get();

        $data = Contact::find($id);
        return view('contact.edit', compact('user','data'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        try {
            $id = Contact::find($request->id);
            
            // if  {
            //     Contact::where('id', $request->id)->update([
            //         'gambar' => $pathgambar,
            //         'about' => $request->about,
            //         'contact' => $request->contact,
            //     ]);
            //     // dd($request->all());
            // } else {
                // dd($request->all());   
                Contact::where('id', $request->id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone_number' => $request->phone_number,
                    'message' => $request->message,
                ]);
                          
            // }
            return redirect('contact');
        } catch (Exception $error) {
            return redirect()->back()->with(['failed'=> $error->getMessage(),
        ]);
        }
    }

    public function delete($id)
    {
        try {
            $contact = Contact::find($id);

            if ($contact->gambar) {
                Storage::delete($contact->gambar);
            }
            Contact::destroy($id);

            return redirect('contact');
        } catch (Exception $error) {
            return redirect()->back()->with([
                'failed' => $error->getMessage()
            ]);
        }
    }
}
