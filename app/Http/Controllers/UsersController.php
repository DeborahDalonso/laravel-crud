<?php

namespace App\Http\Controllers;

use \App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('user.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //O ideal é fazer uma validação por uma classe propria Request, mas é possivel usar o Request padrão
        //É necessário passar um array de regras
        $request->validate([
            'name' => 'string|required', //tbm é possivel ['required','string']
            'email' => 'email|required|unique:users', //quando voce usa o unique voce deve especificar a tabela
            'password' => 'string|required|min:8|max:16'
        ]);

        $userData = $request->only(['name','email','password']);

        User::create($userData);

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('user.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('user.edit', [
            'user' => $user
        ]);
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
        $request->validate([
            'name' => 'string|required', //tbm é possivel ['required','string']
            'email' => 'email|required|unique:users', //quando voce usa o unique voce deve especificar a tabela
            'password' => 'string|required|min:8|max:16'
        ]);

        $user = User::find($id);

        $userData = $request->all();

        $user->update($userData);

        return redirect('/');
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

        if(!$user) Throw new ModelNotFoundException();

        $user->delete();

        return redirect()->back();
    }
}
