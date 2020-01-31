@if(!is_null($text ?? ''))
    <p>{{$text ?? ''}}</p>
@endif

<form action="{{route('users.one.post',['id'=>$user->id])}}" method="post">
    @csrf
    ID:<br>
    <label>
        <input type="text" name="id" value="{{$user->id}}" disabled>
    </label><br>

    First name:<br>
    <label>
        <input type="text" name="firstname" value="{{$user->first_name}}">
    </label><br>
    Last name:<br>
    <label>
        <input type="text" name="lastname" value="{{$user->last_name}}">
    </label><br>
    national code:<br>
    <label>
        <input type="text" name="nationalcode" value="{{$user->national_code}}">
    </label> <br>

    mobile:<br>
    <label>
        <input type="text" name="mobile" value="{{$user->mobile_phone}}">
    </label> <br>

    Date of birth:<br>
    <label>
        <input type="text" name="dob" value="{{$user->date_of_birth}}">
    </label> <br>

    <input type="submit" value="update">
</form>

<form method="post" action="{{route('users.one.delete',['id'=>$user->id])}}">
    @csrf
    @method('DELETE')
    <button type="submit">delete</button>
</form>
