<h1><a href="/">main</a></h1>
<a href="{{route('users.show.create')}}"> Create new user</a>
<table>
    Users :
    <tr>
        <th>ID</th>
        <th>first name</th>
        <th>last name</th>

    </tr>
    @foreach ($users as $user)
        <tr>
            <td> {{ $user->id }}</td>
            <td> {{ $user->first_name }}</td>
            <td> {{ $user->last_name }}</td>
            <td><a href="{{route('show.address',['userid'=>$user->id,])}}">choose</a></td>
        </tr>
    @endforeach
</table>
<h3>
    <a href="{{route('show.address',['userid'=>0,])}}">Or do not select user</a>
</h3>
