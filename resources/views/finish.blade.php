<h1><a href="/">main</a></h1>
<h1> Total price {{$price}}</h1>

<h3>Details : </h3>
<table>
    <tr>
        <th>food_name</th>
        <th>price</th>
    </tr>
    @foreach ($foods as $food)
        <tr>
            <td> {{ $food->food_name }}</td>
            <td> {{ $food->price}}</td>
        </tr>
    @endforeach
</table>

