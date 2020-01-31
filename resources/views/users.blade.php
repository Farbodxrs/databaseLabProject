<a href="{{route('users.show.create')}}"> Create new user</a>
<table>
    <tr>
        <th>ID</th>
        <th>first name</th>
        <th>last name</th>
        <th>national code</th>
        <th>mobile phone</th>
        <th>age</th>
        <th>created at</th>

    </tr>
    @foreach ($users as $user)
        <tr>
            <td> {{ $user->id }}</td>
            <td> {{ $user->first_name }}</td>
            <td> {{ $user->last_name }}</td>
            <td> {{ $user->national_code }}</td>
            <td> {{ $user->mobile_phone }}</td>
            <td> {{ $user->age }}</td>
            <td> {{ $user->created_at }}</td>
            <td><a href="{{route('users.one.get',['id'=>$user->id,])}}">view</a></td>
            <td><a href="{{route('address.get',['userid'=>$user->id])}}">addresses</a></td>
        </tr>
    @endforeach
</table>
