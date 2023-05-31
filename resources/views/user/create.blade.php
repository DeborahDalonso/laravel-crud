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
        <h4>Create User</h4>
        <hr>
        <form method="post" action="{{ route('user.store') }}" autocomplete="off">
            @csrf
            <div class="row">
                <div class="mb-3 col-md-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                        value="{{ old('name') }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 col-md-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 col-md-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        value="{{ old('password') }}">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation" class="text-info">Confirm Password:</label><br>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>
                <div class="mb-3 col-md-3">
                    <label for="street" class="form-label">Street</label>
                    <input type="text" name="street" class="form-control @error('street') is-invalid @enderror"
                        value="{{ old('street') }}">
                    @error('street')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-3">
                    <label for="number" class="form-label">Number</label>
                    <input type="text" name="number" class="form-control @error('number') is-invalid @enderror"
                        value="{{ old('number') }}">
                    @error('number')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3 col-md-3 form-check">
                    <input class="form-check-input @error('term') is-invalid @enderror" type="radio" name="term"
                        id="term">
                    <label class="form-check-label" for="flexRadioDefaul1">
                        Use Terms
                    </label>
                    @error('term')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="mb-3 col-md-3">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </main>
</body>

</html>
