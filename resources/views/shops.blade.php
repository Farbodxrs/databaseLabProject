<h1>Shops list</h1>
<table>
    <tr>
        <th>ID</th>
        <th>shop name</th>
        <th>is_active</th>
    </tr>
    @foreach ($shops as $shop)
        <tr>
            <td> {{ $shop->id }}</td>
            <td> {{ $shop->name }}</td>
            <td> {{ $shop->is_active}}</td>
            <td><a href="{{route('shops.one.get',['id'=>$shop->id])}}">view</a></td>
        </tr>
    @endforeach
</table>
<h1>Or you can add new shops</h1>
<form action="{{route('shops.one.post')}}" method="post">
    @csrf

    Name:<br>
    <label>
        <input type="text" name="name">
    </label><br>


    is Active:<br>
    <label>
        <input type="text" name="active">
    </label><br>
    <input type="submit" value="add">

</form>
