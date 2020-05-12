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

<!-- datepicker -->



<div class="container">
<form method="post" action="{{route('ideas.update', $idea->id)}}" >
        @method('PATCH')
        @csrf
                <table class="table">
                <tbody>
                <tr>
                        <td><label for="title" >Title</label></td>
                        <td><input name="title" type="text" class="form-control" value="{{ $idea->title }}"/></td>
                </tr>
                <tr>
                        <td><label for="destination" >Destination(City or Country)</label></td>
                        <td><input name="destination" type="text" class="form-control" value="{{ $idea->destination }}"/></td>
                </tr>
                <tr>
                        <td><label for="startdate" >Start Date</label></td>
                        <td><input id="from" name="startdate" type="text" class="form-control" value="{{$idea->startdate}}"/></td>
                </tr>
                <tr>
                        <td><label for="enddate" >End Date</label></td>
                        <td><input id="to" name="enddate" type="text" class="form-control" value="{{$idea->enddate}}"/></td>
                </tr>
                <tr>
                        <td><label for="post_tag" >Tags</label></td>
                        <td><input name="post_tag" type="text"  class="form-control" value="{{$idea->taglist}}"/></td>
                </tr>
                <tr>
                        <td><label for="description" >Description</label></td>
                        <td><input name="description" type="text"  class="form-control" value="{{$idea->description}}"/></td>
                </tr>
                <tr>
                        <td align="center" colspan="2"><button class=" btn btn-primary" type="submit">Update !</button></td>
                </tr>
                </tbody>
                </table>
</form>
</div>


@endsection