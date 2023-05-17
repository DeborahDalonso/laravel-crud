<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Create Post</title>
</head>

<body>
    <main class="container">
        <br>
        <h4>Create Post</h4>
        <hr>
        <form method="post" action="{{ route('post.store') }}">
            @csrf
            <div class="row">
                <div class="mb-3 col-md-12">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="mb-3 col-md-12">
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" rowns="10" class="form-control @error('content') is-invalid @enderror"
                        value="{{ old('content') }}"></textarea>
                    @error('content')
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
