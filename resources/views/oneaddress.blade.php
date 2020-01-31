<form action="{{route('address.one.post',['id'=>$address->id])}}" method="post">
    @csrf
    ID:<br>
    <label>
        <input type="text" name="id" value="{{$address->id}}" disabled>
    </label><br>

    Address name:<br>
    <label>
        <input type="text" name="name" value="{{$address->name}}">
    </label><br>
    Address : :<br>
    <label>
        <input type="text" name="address" value="{{$address->address}}">
    </label> <br>

    phone:<br>
    <label>
        <input type="text" name="phone" value="{{$address->phone}}">
    </label> <br>
    <input type="submit" value="update">
</form>

<form method="post" action="{{route('address.one.delete',['id'=>$address->id])}}">
    @csrf
    @method('DELETE')
    <button type="submit">delete</button>
</form>
