<h1><a href="/">main</a></h1>
<p>addresses for user : {{$name}}</p>
<table>
    <tr>
        <th>name</th>
        <th>address</th>
        <th>phone</th>
    </tr>
    @foreach ($address as $item)
        <tr>
            <td> {{ $item->name }}</td>
            <td> {{ $item->address }}</td>
            <td> {{ $item->phone }}</td>
            <td><a href="{{route('address.one.get',['id'=>$item->id])}}">view</a></td>
        </tr>
    @endforeach
</table>
<h1>Or you can add new address for this user</h1>
<form action="{{route('address.one.create')}}" method="post">
    @csrf
    name:<br>
    <label>
        <input type="text" name="name">
    </label><br>


    address:<br>
    <label>
        <input type="text" name="address">
    </label><br>

    phone:<br>
    <label>
        <input type="text" name="phone">
    </label><br>
    <input type="hidden" name="user_id" value="{{$user_id}}">
    <input type="submit" value="create">
</form>

