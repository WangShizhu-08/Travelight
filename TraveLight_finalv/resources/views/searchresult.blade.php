@extends('layouts.app')

@section('content')

<div class="container">
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
    <div class="d-flex">
    <h3 class="offset-4 pt-5 pl-5 pr-3">Travel Idea Search Result</h3>
    <a class="pt-5" href="/ideas/create"><img src="images/plus-flat.png" width="25px"alt=""></a>
    </div>
    <p><span id="total_records"></span>  Records Found!</p>
    <div class="row">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <td>IdeaId</td>
                    <td>Title</td>
                    <td>Destination</td>
                    <td>StartDate</td>
                    <td>Enddate</td>
                    <td>Comments</td>
                </tr>
            </thead>
            <tbody id="search_result">
            </tbody>
        </table>
    </div>
</div>
<script>
    $data = {!!$data!!};
    $table_data = $data['table_data'];
    $total_records = $data['total_records']
    document.getElementById('search_result').innerHTML = $table_data;
    document.getElementById('total_records').innerHTML = $total_records;
</script>
@endsection