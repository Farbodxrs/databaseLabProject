<form action="{{route('shops.one.update',['id'=>$shop->id])}}" method="post">
    @csrf
    ID:<br>
    <label>
        <input type="text" name="id" value="{{$shop->id}}" disabled>
    </label><br>

    name:<br>
    <label>
        <input type="text" name="name" value="{{$shop->name}}">
    </label><br>

    is active:<br>
    <label>
        <input type="text" name="active" value="{{$shop->is_active}}">
    </label> <br>
    <input type="submit" value="update">
</form>

<form method="post" action="{{route('shops.one.delete',['id'=>$shop->id])}}">
    @csrf
    @method('DELETE')
    <button type="submit">delete</button>
</form>
