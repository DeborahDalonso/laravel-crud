<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Edit User</title>
</head>

<body>
    <main class="container">
        <br>
        <h4>Edit User</h4>
        <hr>
        <form method="post" action="{{ route('user.update', $user->id) }}">
            @csrf
            @method('put')
            <div class="row">
                <div class="mb-3 col-md-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                </div>
                <div class="mb-3 col-md-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                </div>
                <div class="mb-3 col-md-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" name="password" class="form-control" value="{{ $user->password }}">
                </div>
                <div class="mb-3 col-md-3">
                    <label for="street" class="form-label">Rua</label>
                    <input type="text" name="street" class="form-control value="{{ old('street') }}">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-3">
                    <label for="number" class="form-label">Número</label>
                    <input type="text" name="number" class="form-control" value="{{ old('number') }}">
                </div>
            </div>
            <div class="mb-3 col-md-3">
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </form>
    </main>
</body>

</html>
