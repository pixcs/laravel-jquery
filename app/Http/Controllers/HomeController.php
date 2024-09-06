<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index() {
    $roles = Role::get();

      return view('roles.create', compact('roles'));
    }

    public function store(Request $request) {
      $validated = $request->validate([
        'name' => 'required|unique:roles|max:25',
        'display_name' => 'required|unique:roles|max:25',
        'description' => 'required|unique:roles'
      ]);
      
      Role::create($validated);

      $roles = Role::all();

      return response()->json($roles);

    }

    public function destroy(Request $request) {
      $role = Role::where('id', $request->id)->delete();

      $roles = Role::all();

      return response()->json($roles);
    
    }
}


