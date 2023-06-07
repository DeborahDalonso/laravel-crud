{{-- @foreach ($users as $user) --}}
{{-- dentro de qualquer loop é criada a variavel $loop que contem valores importantes a respeito da repetiçãp --}}
{{-- como posição atual do laço, numero total de itens, primeiro item, ultimo item, se é impar, em qual nivel de aninhamento esta e etc --}}
{{-- os valores em iteração não são o mesmo de index, index é de 0 até o final, e iteração é de 1, a maior parte das contegens, como se é impar ou não parte do valor de iteração --}}
{{-- em loops aninhados é possivel acessar os valores de $loop pai usando $loop->parent->o_que_voce_precisa --}}
{{-- odd é só os impars --}}
{{-- @if ($loop->odd) --}}
    {{-- first primeiro elemento ... não me diga queen --}}
    {{-- <tr class="@if ($loop->first) bg-danger @endif"> --}}
    <tr>
        {{-- iteration é o valor em iteração, de 1 até o ultimo elemento, lembre que existe o caunt também que mostra o total --}}
        {{-- <td class="col-1">{{ $loop->iteration }}</td> --}}
        <td class="col-1">{{ $user->id }}</td>
        <td><img src="{{ asset('storage/' . $user->image->image) }}" width="50%" alt="">
        </td>
        <td class="col-1">{{ $user->name }}</td>
        <td class="col-2">{{ $user->email }}</td>
        <td class="col-1">{{ $user->address->street }}</td>
        <td class="col-1">{{ $user->address->number }}</td>
        <td class="col-6">
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
                    <a href="{{ route('user.posts', $user->id) }}" type="button"
                        class="btn btn-primary">Posts</a>
                </div>
                <div class="mb-1 col-md-3">
                    <a href="{{ route('user.address', $user->id) }}" type="button"
                        class="btn btn-dark">Address</a>
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
{{-- @endif --}}
{{-- @endforeach --}}