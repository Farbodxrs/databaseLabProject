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
            <td><a href="{{route('add.food',[
    'foodid'=>$food->id,
    'factorid'=>$factorid,
])}}">choose</a></td>
        </tr>
    @endforeach
</table>

<a href="{{route('order.finish',['factorid'=>$factorid])}}">finish</a>
