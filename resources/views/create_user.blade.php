<p>create new user</p>
<form action="{{route('users.one.create')}}" method="post">
    @csrf
    First name:<br>
    <label>
        <input type="text" name="firstname">
    </label><br>
    Last name:<br>
    <label>
        <input type="text" name="lastname">
    </label><br>
    national code:<br>
    <label>
        <input type="text" name="nationalcode">
    </label> <br>

    mobile:<br>
    <label>
        <input type="text" name="mobile">
    </label> <br>

    Date of birth:<br>
    <label>
        <input type="text" name="dob">
    </label> <br>

    <input type="submit" value="create">
</form>
