<form action="{{route('enter.address')}}" method="post">
    @csrf
    <label>
        <h3>enter address here</h3>
        <br>
        <input type="text" name="address">
        <input type="text" hidden name="userid" value="{{$userid}}">
        <input type="submit">
    </label>
</form>
