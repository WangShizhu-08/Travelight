@extends('layouts.app')

@section('content')

<article id="all_ideas">
<!-- @if(count($ideas) > 0) -->
<div class="d-flex">
<h2 class="offset-4 p-3">All Travel Ideas!</h2>
<a class="pt-3" href="/ideas/create"><img src="images/plus-flat.png" width="25px"alt=""></a>
</div>

<table>
    <thead>
		<tr>
			<td>ID</td>
			<td>Title</td>
			<td>Destination</td>
			<td>Start_Date</td>
			<td>End_Date</td>
			<td>Description</td>
			<td>Comments</td>
		</tr>
    </thead>
    <tbody id="idea-results">
		@foreach($ideas as $idea)
		<tr>
		<td>{{$idea->id}}</td>
			<td><a href="{{ route('ideas.show',$idea->id)}}">{{$idea->title}}</a></td>
			<td>{{$idea->destination}}</td>
			<td>{{$idea->startdate}}</td>
			<td>{{$idea->enddate}}</td>
			<td>{{$idea->description}}</td>
			<td>{{$idea->comments_number}}</td>
		</tr>
		@endforeach
    </tbody>
</table>
<p id="summary"></p>

<!-- @else -->

<p>There is not any idea currently. Go create one!</p>

<!-- @endif -->

</article>

@endsection


