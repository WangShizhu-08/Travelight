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
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success')}}
        </div><br>
    @endif
</div>

<div class="container" style="min-width: 960px;">
    <article class="travel-c">
        <h2>A Travel Idea to {{$idea->destination}}!</h2>
        <p>IdeaTitle: {{ $idea->title}}</p>
        <p>UserName: <span><a href="{{route('profile.show', $idea->user->profile->id)}}">{{$idea->user->username}}</a></span></p>
        <p>Destination:<span id="dest"> {{ $idea->destination}}</span></p>
        <p>Travel Date: {{$idea->startdate}} to {{$idea->enddate}}</p>
        <p>Tags: {{ $idea->taglist}}</p>
        <p>Description: {{ $idea->description}}</p>

        <!-- Only the Owner of the idea can see the edit button -->
        @if ($user->can('update',$idea))
            <a href="{{ route('ideas.edit', $idea->id) }}">Edit Your idea</a>
        @endif

        <hr>
        <section>
            <p>Total <span id="comments_number">{{$idea->comments_number}}</span> comment(s)</p>
            <div id="chatbox"></div>
            <input id="comments_content" style="width: 260px"/>
            <input id="sendcomment" type="submit" value="Post a Comment" />
        </section>
    </article>

    <article class="dest-c">
        <!-- google map -->
        <h2>Destination Map</h2>
        <div id="map"></div>
        <!-- hotwire hotel -->
        <h2 class="pt-5">Hotwire Hotel Search</h2>
        <p id="testa"></p>
        <ol id="hotel_list"></ol>
    </article>
</div>

<?php
// function to geocode address, it will return false if unable to geocode address
    function geocode($address){

    // url encode the address
    $address = urlencode($address);
        
    // google map geocode api url
    $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=AIzaSyAOrYjjQAu9hxRx7I65U0fwNn6Hirg1lYo";

    // get the json response
    $resp_json = file_get_contents($url);
        
    // decode the json
    $resp = json_decode($resp_json, true);

    // response status will be 'OK', if able to geocode given address 
    if($resp['status']=='OK'){

        // get the important data
        $lati = isset($resp['results'][0]['geometry']['location']['lat']) ? $resp['results'][0]['geometry']['location']['lat'] : "";
        $longi = isset($resp['results'][0]['geometry']['location']['lng']) ? $resp['results'][0]['geometry']['location']['lng'] : "";
        $formatted_address = isset($resp['results'][0]['formatted_address']) ? $resp['results'][0]['formatted_address'] : "";
            
        // verify if data is complete
        if($lati && $longi && $formatted_address){
            
            // put the data in the array
            $data_arr = array();            
                
            array_push(
                $data_arr, 
                    $lati, 
                    $longi, 
                    $formatted_address
                );
                
            return $data_arr;
                
        }else{
            return false;
        }
            
    }

    else{
        echo "<strong>ERROR: {$resp['status']}</strong>";
        return false;
    }
    }

    $latitude = geocode($idea->destination)[0];
    $longitude = geocode($idea->destination)[1];
?>


<script type="text/javascript">
    var latitude = <?php echo $latitude ?>;
    var longitude = <?php echo $longitude ?>;

    var map;
    function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: latitude, lng: longitude},
        zoom: 9
    });
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOrYjjQAu9hxRx7I65U0fwNn6Hirg1lYo&callback=initMap" 
async defer>
</script>
@endsection