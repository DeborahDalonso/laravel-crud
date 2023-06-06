<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserStoreRequest;
use App\Models\Address;
use \App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with(['address', 'image'])->get();

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
    public function store(UserStoreRequest $request)
    {
        $userData = $request->validated();

        //Atençao!! Lembre de todos os atributos que voce possui dentro do objetro Illuminate/UploadFile, nome e endereço temporario e size, por exemplo.
        //$userData['image']->getSize, ->getPathname, ->getMimetype

        // $extension = $request->image->extension();

        //Crie um diretorio e salve a imagem nele, lebrando que tudo sera salvo no default em fiesystem.php
        // $userData['image']->store('teste');

        //Crie um diretorio e salve a imagem renomeada nele
        // $userData['image']->storeAs('teste', 'novoNome');

        //Crie um diretorio e salve a imagem renomeada nele, passando o local onde irá ser salva, ignorando o default em filesystem
        // $userData['image']->storeAs('teste', 'novoNome', 'local');

        //Crie um diretorio e salve a imagem renomeada com extensão correta da imagem, existem os metodos getClientBlaBla que são usado pra isso mas são uma bosta, nao use 
        // $extension = $userData['image']->extension();
        // $userData['image']->storeAs('teste', 'novoNome' . ".$extension");
 
        // $request->hasFile('image'){
            //se existe o file faça...
        // }

        //Slug pega uma string e coverte para a forma de caracteres simples e sem espações, legivel tanto para pessoas quanto mecanismos de pesquisa
        //ele aceita um segundo parametro que define que tipo de separador será usado
        //now() pega a data corrente
        //toda vez que é usado o store ou o storeAs para salvar uma imagem é devolvido o caminho dessa imagem para recupera-la futuramente. 
        $path = $userData['image']->store(Str::slug( $userData['name']) . '-' . Str::slug(now()));

        $userData['password'] = bcrypt($userData['password']);
        
        $user = User::create($userData);
        $user->address()->create($userData);

        //salvando a imagem
        $user->image()->create([
            'image' => $path
        ]);

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
        $user = User::with('address')->find($id);

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
        $user = User::find($id);

        $userData = $request->only(['name', 'email']);

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
        $user->delete();

        return redirect()->back();
    }

    public function address($id)
    {
        $user = User::with('address')->find($id);
        
        return view('user.address', [
            'user'=> $user
        ]);
    }
}
