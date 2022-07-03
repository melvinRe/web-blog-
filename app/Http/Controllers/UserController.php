<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Mockery\Expectation;

class UserController extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('user.index', compact('data'));
    }

    public function add()
    {
        return view('user.add');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
        'name' => ['required','string','max:255'],
        'email' => ['required','string','email','max:255','unique:users'],
        'password' => ['required','string','min:8'],

        ]);

        try{
        user::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('user');

    } catch(Exception $error) {
        // dd($error->getMessage());
        return redirect()->back()->with([
            'failed'=>$error->getMessage()
        ]);
    }
    }

    public function edit($id)
    {
        $data = User::find($id);
        
        return view('user.edit', compact('data'));
    }

    public function update(Request $request)
    {
        try {
            $id = $request->id;
            $user = User::find($id);

            if ($request->password) {
                $newPassword = Hash::make($request->password);
            } else {
                $newPassword  = $user->password;
            } 

            User::where('id', $id)->update([
                'name'=> $request->name,
                'password'=> $newPassword,
            ]);
            return redirect('user');
            
        } catch (Exception $error) {
            return redirect()->back()->with([
                'failed'=>$error->getMessage()
            ]);
    }
}
public function delete($id)
{
    try{
        User::destroy($id);
        return redirect('user');
    } catch (Exception $error) {
        return redirect()->back()->with([
            'failed'=>$error->getMessage()
        ]);
    }
}
}
