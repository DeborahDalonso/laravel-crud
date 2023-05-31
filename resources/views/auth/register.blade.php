<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<body>
    <main>
        <div class="h-100 d-flex justify-content-center align-items-center">
            <div class="col-md-4 p-5 shadow-sm border rounded-3">
                <h2 class="text-center mb-4  text-primary">Register</h2>
                <form method="post" action="{{ route('user.store') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name" class="text-info">Name:</label><br>
                        <input type="text" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email" class="text-info">Email:</label><br>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="street" class="text-info">Street:</label><br>
                        <input type="text" name="street" id="street"
                            class="form-control @error('street') is-invalid @enderror" value="{{ old('street') }}">
                        @error('street')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="number" class="text-info">Number:</label><br>
                        <input type="text" name="number" id="number"
                            class="form-control @error('number') is-invalid @enderror" value="{{ old('number') }}">
                        @error('number')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="text-info">Password:</label><br>
                        <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation" class="text-info">Confirm Password:</label><br>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control">
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input @error('term') is-invalid @enderror" type="radio"
                            name="term" id="term">
                        <label class="form-check-label" for="flexRadioDefaul1">
                            Use Terms
                        </label>
                        @error('term')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-block btn-info btn-md" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
