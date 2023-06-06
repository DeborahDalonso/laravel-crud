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
                <div class="mb-3 col-md-4">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control"
                        value="{{ $user->name }}">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control"
                    value="{{ $user->email }}">
                </div>
                <div class="mb-3 col-md-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control"
                    value="{{ $user->password }}">
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-5">
                    <label for="street" class="form-label">Street</label>
                    <input type="text" name="street" class="form-control"
                    value="{{ $user->address->street }}">
                </div>
                <div class="mb-3 col-md-3">
                    <label for="number" class="form-label">Number</label>
                    <input type="text" name="number" class="form-control"
                    value="{{ $user->address->number }}">
                   
                </div>
                <div class="mb-3 col-md-4">
                    <label for="password_confirmation" class="form-label">Confirm Password:</label><br>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>
            </div>
            <div class="form-group mb-3">
                <input name="image" type="file" accept=".jpg, .png, .jpeg">
            </div>
            <div class="row">
                <div class="mb-3 col-md-3 form-check">
                    <input class="form-check-input" type="radio" name="term"
                        id="term" checked readonly>
                    <label class="form-check-label" for="flexRadioDefaul1">
                        Use Terms
                    </label>
                </div>
            </div>
            <div class="mb-3 col-md-3">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </main>
</body>

</html>
