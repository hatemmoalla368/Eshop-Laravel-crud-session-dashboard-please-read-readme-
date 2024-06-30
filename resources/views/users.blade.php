@extends("layouts.template")
@section("content")

@if(Session::has("success"))
<div class="alert alert-success">
{{Session::get("success")}}
</div>
@endif

<table class="table table-stripped table-bordered">
    <thead>
        <tr>
            <th>id de user</th>
            <th>nom de user</th>
            <th>email du user</th>
            <th>telephone du user</th>
            <th>adresse du user</th>
            <th>role du user</th>
            <th>supprimer user</th>

        </tr>
    </thead>
    <tbody>
@forelse ($users as $user)
        <tr>

            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->tel}}</td>
            <td>{{$user->adresse}}</td>
            <td>
                @if (auth()->user()->role === 'super admin' && $user->id !== auth()->id())
                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="role">
                            <option value="client" {{ $user->role === 'client' ? 'selected' : '' }}>Client</option>
                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                        <button type="submit">Change Role</button>
                    </form>
                @else
                    <!-- Display something if the current user is not authorized to change roles -->
                    Role change not allowed
                @endif
            </td>

            <td>
                @if (auth()->user()->role === 'super admin' && $user->id !== auth()->id())
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                @else
                    <!-- Display something if the current user is not authorized to delete -->
                    Delete not allowed
                @endif
            </td>


        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">pas d'utilisateur pour ce moment !</td>
        </tr>
@endforelse
    </tbody>
</table>
@endsection
