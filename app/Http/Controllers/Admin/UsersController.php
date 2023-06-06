<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Position;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    
    public function create(Request $request){
        // dd('koko');
        $positions = Position::all();
        $user = new User();
        return view('admin.users.create', compact('positions', 'user'));
    }
    
    public function store(Request $request){
        // dd($request);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->position_id = $request->position_id;
        $user->save();
        // dd($user);
        // User::create(['name' => $request->name, 'email' => $request->email, 'password' => Hash::make($request->password), 'position' => $request->position_id]);
        // User::create(['name' => $request->name, 'email' => $request->email, 'password' => Hash::make($request->password), 'position' => $request->position_id]);
        
        return redirect('admin/dashboard');
    }
}
