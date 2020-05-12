@extends('layouts.app')

@section('content')


<div class="message">
@if ($errors->any())
<div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
        </ul>
</div>
@endif
</div>

<div class="container">
<div class="row">
        <h2>Create Your Profile!</h2>
</div>
<form method="post" action="{{route('profile.store')}}" >
        {{ csrf_field() }}
                <table class="table">
                <tbody>
                <tr>
                        <td><label for="gender" >Gender</label></td>
                        <td>  
                        <input type="radio" id="male" name="gender" value="1">
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender" value="0">
                        <label for="female">Female</label>
                        </td>
                </tr>
                <tr>
                        <td><label for="age" >Age</label></td>
                        <td><input name="age" type="text" class="form-control" value="{{old('age')}}"/></td>
                </tr>
                <tr>
                        <td><label for="occupation" >Occupation</label></td>
                        <td><input name="occupation" type="text"  class="form-control" value="{{old('occupation')}}"/></td>
                </tr>
                <tr>
                        <td><label for="description" >Description</label></td>
                        <td><input name="description" type="text"  class="form-control" value="{{old('description')}}"/></td>
                </tr>
                <tr>
                        <td align="center" colspan="2"><button class=" btn btn-primary" type="submit">Create !</button></td>
                </tr>
                </tbody>
                </table>
</form>
</div>


@endsection