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
        <h4>Users List</h4>
        <a href="{{ route('user.create') }}" type="button" class="btn btn-primary">Create New User</a>
        <a href="{{ route('post.create') }}" type="button" class="btn btn-primary">Create New Post</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="col-1">{{ $user->id }}</td>
                        <td class="col-2">{{ $user->name }}</td>
                        <td class="col-2">{{ $user->email }}</td>
                        <td class="col-4">
                            <div class="row">
                                <div class="mb-1 col-md-2">
                                    <a href="{{ route('user.show', $user->id) }}" type="button"
                                        class="btn btn-success">View</a>
                                </div>
                                <div class="mb-1 col-md-2">
                                    <a href="{{ route('user.edit', $user->id) }}" type="button"
                                        class="btn btn-warning">Edit</a>
                                </div>
                                <div class="mb-1 col-md-2">
                                    <form method="post" action="{{ route('user.destroy', $user->id) }}">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    </main>
</body>

</html>
