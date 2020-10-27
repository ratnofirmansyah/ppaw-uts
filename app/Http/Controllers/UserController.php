<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::all();
        $data['i'] = 0;
        return view('user/index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['key'] = null;
        $data['error'] = null;
        return view('user/edit-add', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $password = $request->input('password');
        $konfirmasi_password = $request->input('konfirmasi_password');

        if ($password != $konfirmasi_password) {
            $data['error'] = 'ERROR!! Konfirmasi Password tidak sesuai!!';
            return back()->withInput();
        }

        $data = $request->all();

        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->job = $data['job'];
        $user->password = $data['password'];
        $user->save();

        $path = Storage::putFileAs(
            'public/avatars', $request->file('avatar'), $user->id.'.'.$request->file('avatar')->extension()
        );
        $user->avatar = ltrim($path, 'public/');
        $user->save();
        return redirect('user');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['user'] = User::find($id);
        $data['key'] = $id;
        $data['error'] = null;
        return view('user/edit-add', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $password = $request->input('password');
        $konfirmasi_password = $request->input('konfirmasi_password');

        if ($password != $konfirmasi_password) {
            $data['error'] = 'ERROR!! Konfirmasi Password tidak sesuai!!';
            return back()->withInput();
        }

        $data = $request->all();

        $user = User::find($id);

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->job = $data['job'];
        $user->password = $data['password'];
        if($request->file('image')){
            $path = Storage::putFileAs(
                'public/avatars', $request->file('avatar'), $id.'.'.$request->file('avatar')->extension()
            );
            $user->avatar = ltrim($path, 'public/');
        }
        $user->save();

        return redirect('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        Storage::delete($user->avatar);
        $user->delete();
        return redirect('user');
    }
}
