<form action="{{route('foods.one.update',['id'=>$food->id])}}" method="post">
    @csrf
    ID:<br>
    <label>
        <input type="text" name="id" value="{{$food->id}}" disabled>
    </label><br>

    name:<br>
    <label>
        <input type="text" name="name" value="{{$food->name}}">
    </label><br>
    Price : <br>
    <label>
        <input type="text" name="price" value="{{$food->price}}">
    </label> <br>

    is active:<br>
    <label>
        <input type="text" name="active" value="{{$food->is_active}}">
    </label> <br>
    <input type="submit" value="update">
</form>

<form method="post" action="{{route('foods.one.delete',['id'=>$food->id])}}">
    @csrf
    @method('DELETE')
    <button type="submit">delete</button>
</form>
