<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Create User</title>
</head>

<body>
    <main class="container">
        <br>
        <h4>Create User</h4>
        <hr>
        <form method="post" action="{{ route('user.store') }}">
            @csrf
            {{-- uma forma de imprimir erros --}}
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            <div class="row">
                <div class="mb-3 col-md-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3 col-md-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="mb-3 col-md-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control">
                </div>
            </div>
            <div class="mb-3 col-md-3">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </main>
</body>

</html>
