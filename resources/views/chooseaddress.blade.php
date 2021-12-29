<h1><a href="/">main</a></h1>
<h3>
    choose address
</h3>
<table>
    <tr>
        <th>ID</th>
        <th>name</th>
        <th>address</th>
        <th>phone</th>

    </tr>
    @foreach ($adds as $add)
        <tr>
            <td> {{ $add->id }}</td>
            <td> {{ $add->name }}</td>
            <td> {{ $add->address }}</td>
            <td> {{ $add->phone }}</td>
            <td><a href="{{route('show.bikes',[
    'addid'=>$add->id,
    'userid'=>$userid,
])}}">choose</a></td>
        </tr>
    @endforeach
</table>

