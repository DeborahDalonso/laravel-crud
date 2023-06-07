<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Index - Users List</title>
</head>

<body>
    <main class="container">
        <div class="d-flex justify-content-between">
            <h4>Users List</h4>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-link">LOGOUT</button>
            </form>
        </div>
        <div class="d-flex justify-content-between">
            <a href="{{ route('user.create') }}" type="button" class="btn btn-primary">New User</a>
            <a href="{{ route('post.create') }}" type="button" class="btn btn-primary">New Post</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    {{-- <th scope="col">Iteração</th> --}}
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Street</th>
                    <th scope="col">Number</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                {{-- Passando novas variaveis dentro de include, atenção!! variaveis presentes no arquivo que chama o input já são herdados para as parts --}}
                {{-- @include('user.__partials.loopUsers', ['teste' => 'teste']); --}}
                {{-- @include('user.__partials.loopUsers') --}}
                {{-- @includeIf('user.__partials.loopUsers') --}}
                {{-- @includeWhen($aluno = true, 'user.__partials.loopUsers') --}}
                {{-- @includeUnless($alunos = false, 'user.__partials.loopUsers') --}}
                {{-- @each('user.__partials.loopUsers', $users, 'user') --}}
                {{-- caso $users esteja vazio carrega o partials do ultimo parametro --}}
                {{-- @each('user.__partials.loopUsers', $users, 'user', 'user.__partials.empty') --}}

            </tbody>
        </table>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    </main>
</body>

</html>
