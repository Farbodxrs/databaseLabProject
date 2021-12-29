<h1><a href="/">main</a></h1>
<h1>Foods list</h1>
<table>
    <tr>
        <th>ID</th>
        <th>food name</th>
        <th>price</th>
        <th>is_active</th>
    </tr>
    @foreach ($foods as $food)
        <tr>
            <td> {{ $food->id }}</td>
            <td> {{ $food->name }}</td>
            <td> {{ $food->price}}</td>
            <td> {{ $food->is_active}}</td>
            <td><a href="{{route('foods.one.get',['id'=>$food->id])}}">view</a></td>
        </tr>
    @endforeach
</table>
<h1>Or you can add new foods</h1>
<form action="{{route('foods.one.post')}}" method="post">
    @csrf

    Name:<br>
    <label>
        <input type="text" name="name">
    </label><br>

    Price:<br>
    <label>
        <input type="text" name="price">
    </label><br>

    is Active:<br>
    <label>
        <input type="text" name="active">
    </label><br>
    <input type="submit" value="add">

</form>
