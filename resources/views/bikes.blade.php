<h1><a href="/">main</a></h1>
<h1>Bikes list</h1>
<table>
    <tr>
        <th>ID</th>
        <th>first name</th>
        <th>last name</th>
        <th>national code</th>
        <th>phone</th>
    </tr>
    @foreach ($bikes as $bike)
        <tr>
            <td> {{ $bike->id }}</td>
            <td> {{ $bike->first_name }}</td>
            <td> {{ $bike->last_name }}</td>
            <td> {{ $bike->national_code}}</td>
            <td> {{ $bike->phone}}</td>
            <td><a href="{{route('bikes.one.get',['id'=>$bike->id])}}">view</a></td>
        </tr>
    @endforeach
</table>
<h1>Or you can add new bikes</h1>
<form action="{{route('bikes.one.post')}}" method="post">
    @csrf

    first Name:<br>
    <label>
        <input type="text" name="fname">
    </label><br>

    last Name:<br>
    <label>
        <input type="text" name="lname">
    </label><br>

    national code:<br>
    <label>
        <input type="text" name="national_code">
    </label><br>

    phone:<br>
    <label>
        <input type="text" name="phone">
    </label><br>
    <input type="submit" value="add">

</form>
