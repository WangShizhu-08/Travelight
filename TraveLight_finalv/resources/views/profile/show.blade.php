@extends('layouts.app')

@section('content')


<div class="container">
    <article class="row">
        <div class="col3 p-5">
            <img id="profilepic" src="" class=" rounded-circle " width="220px">
        </div>

        <div class="col9 p-5">
            <div><h3>{{ $profile->user->username }}</h3></div>
            <table class="table table-bordered">
                <tr>
                    <td>Age</td>
                    <td>{{ $profile->age}}</td>
                </tr>
                <tr>
                    <td>Occupation</td>
                    <td>{{ $profile->occupation}}</td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>{{ $profile->description ?? 'Haven\'t put anything down.' }}</td>
                </tr>
            </table>
        </div>
    </article>


    <!-- display of personal travel ideas -->
    <div class="d-flex">
    <h3 class="offset-4 py-5 pl-5 pr-3">Personal Travel Ideas</h3>
    </div>

    <div class="row">
        <div class="">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td>IdeaId</td>
                    <td>Title</td>
                    <td>Destination</td>
                    <td>StartDate</td>
                    <td>Enddate</td>
                    <td>Tags</td>
                    <td>CreatedAt</td>
                </tr>
            </thead>
            <tbody>
            @foreach($profile->user->ideas as $idea)
                <tr>
                    <td><a href="{{ route('ideas.show', $idea->id)}}">{{$idea->id}}</a></td>
                    <td><a href="{{ route('ideas.show', $idea->id)}}">{{$idea->title}}</a></td>
                    <td>{{$idea->destination}}</td>
                    <td>{{$idea->startdate}}</td>
                    <td>{{$idea->enddate}}</td>
                    <td>{{$idea->taglist}}</td>
                    <td>{{$idea->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>

<script type="text/javascript">
// profile picture

if({{ $profile->gender}} == 0){
    document.getElementById('profilepic').src = '/images/female.png';
}
else{
    document.getElementById('profilepic').src = '/images/male.png';
}
</script>

@endsection
