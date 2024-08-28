<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\Caster\DsCaster;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){   
        $users =  User::all();
        return view('users',[
            'users' => $users
        ]);
    }

    public function store(Request $request){   
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
     
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
        ]);

        return redirect()->back()->with('success', 'usuario agregado exitosamente.');
    }

    public function create(){
        return view('create-users');
    }

    public function search (Request $request){
        $pageSize = 8;
        $validatedData = $request->validate([
            'name' => 'nullable|string',
            'email' => 'nullable|email',
        ]);
        
        $query = User::query();
        
        if($request->filled('name')) {
            $query->where('name', 'like', '%'.$validatedData['name'].'%');
        }
    
        if ($request->filled('email')) {
            $query->where('email', 'like', '%'. $validatedData['email'].'%');
        }
        $users = $query->paginate($pageSize);
    
        return view('users',[
            'users' => $users
        ]);
    }
}
