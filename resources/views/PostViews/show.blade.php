
@extends('layouts.app')

@section('content')

@section('title','View Post Details')

<div class="container">


@if ($errors->any())
<div class="alert alert-danger">

    <strong>Whoops!</strong> There were some problems with your input.<br><br>

    <ul>

    @foreach ($errors->all() as $error)

        <li>{{ $error }}</li>

    @endforeach

    </ul>

</div>

@endif


<div class="col-lg-12 margin-tb">
    <div class="pull-left">
        <h2> Post Details</h2>
    </div>

    <div class="pull-right">
        <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
    </div>

</div>

</br>



<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">{{ $posts->title}}</h5>
    <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
    <p class="card-text">{{ $posts->content}}</p>
    <p class="card-link">Posted: {{ $posts->created_at}}</p>
    
  </div>
</div>



</div>

@endsection