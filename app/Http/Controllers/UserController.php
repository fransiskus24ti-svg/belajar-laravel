<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['dataUser'] = user::all();
		return view('admin.user.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create');
        // $data['password'] = Hash::make($request->password);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // $data['name'] = $request->name;
		// $data['email'] = $request->email;
		// $data['password'] = $request->password;
        // $data['password'] = Hash::make($request->password);
		// user::create($data);

        $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
    ]);

    $data['name'] = $request->name;
    $data['email'] = $request->email;
    $data['password'] = Hash::make($request->password);

		return redirect()->route('user.index')->with('success','Penambahan Data Berhasil!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['dataUser'] = user::findOrFail($id);
        return view('admin.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user_id = $id;
        $user = user::findOrFail($user_id);

        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = $request->password;
        // $data['password'] = Hash::make($request->password);
        $request->validate([
        'name' => 'required|string|max:100',
        'email' => 'required|email|unique:users,email,'.$user->id.',id',
        'password' => 'nullable|string|min:8|confirmed'
]);
        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
            $user->save();
            return redirect()->route('user.index')->with('success', 'Perubahan Data Berhasil!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = user::findOrfail($id);
        $user->delete();
        return redirect()->route('user.index')->with('Success','Data berhasil dihapus');
    }
}
