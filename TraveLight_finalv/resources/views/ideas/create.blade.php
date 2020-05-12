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
        <h2>Share your travel Idea here!</h2>
</div>
<form method="post" action="{{route('ideas.store')}}" >
        {{ csrf_field() }}
                <table class="table">
                <tbody>
                <tr>
                        <td><label for="title" >Title</label></td>
                        <td><input name="title" type="text" class="form-control" value="{{old('title')}}"/></td>
                </tr>
                <tr>
                        <td><label for="destination" >Destination(City or Country)</label></td>
                        <td><input name="destination" type="text" class="form-control" value="{{old('destination')}}"/></td>
                </tr>
                <tr>
                        <td><label for="startdate" >Start Date</label></td>
                        <td><input id="from" name="startdate" type="text" class="form-control" value="{{old('startdate')}}"/></td>
                </tr>
                <tr>
                        <td><label for="enddate" >End Date</label></td>
                        <td><input id="to" name="enddate" type="text" class="form-control" value="{{old('enddate')}}"/></td>
                </tr>
                <tr>
                        <td><label for="description" >Description</label></td>
                        <td><input name="description" type="text"  class="form-control" value="{{old('description')}}"/></td>
                </tr>
                <tr>
                        <td><label for="post_tag" >Tags</label></td>
                        <td><input name="post_tag" type="text"  class="form-control" value="{{old('post_tag')}}"/></td>
                </tr>
                <tr>
                        <td align="center" colspan="2"><button class=" btn btn-primary" type="submit">Create !</button></td>
                </tr>
                </tbody>
                </table>
</form>
</div>

@endsection