<h1><a href="/">main</a></h1>
<h1>Bikes list</h1>
<table>
    <tr>
        <th>ID</th>
        <th>first name</th>
        <th>phone</th>
    </tr>
    @foreach ($bikes as $bike)
        <tr>
            <td> {{ $bike->id }}</td>
            <td> {{ $bike->first_name }}</td>
            <td> {{ $bike->phone}}</td>
            <td><a href="{{route('save.factor',[
    'bikeid'=>$bike->id,
    'addid'=> $addid,
    'userid'=>$userid,
])}}">choose</a></td>
        </tr>
    @endforeach
</table>
