<form action="{{route('bikes.one.update',['id'=>$bike->id])}}" method="post">
    @csrf
    ID:<br>
    <label>
        <input type="text" name="id" value="{{$bike->id}}" disabled>
    </label><br>

    fname:<br>
    <label>
        <input type="text" name="fname" value="{{$bike->first_name}}">
    </label><br>

    lname:<br>
    <label>
        <input type="text" name="lname" value="{{$bike->last_name}}">
    </label><br>

    national code : <br>
    <label>
        <input type="text" name="national_code" value="{{$bike->national_code}}">
    </label> <br>

    phone:<br>
    <label>
        <input type="text" name="phone" value="{{$bike->phone}}">
    </label> <br>
    <input type="submit" value="update">
</form>

<form method="post" action="{{route('bikes.one.delete',['id'=>$bike->id])}}">
    @csrf
    @method('DELETE')
    <button type="submit">delete</button>
</form>
