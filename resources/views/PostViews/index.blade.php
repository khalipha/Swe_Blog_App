@extends('layouts.app')

@section('content')

@section('title','View Posts')

<div class="container">


<div class="row">

            <div class="col-md-4">

                <h2>Blog Posts</h2>

            </div>

            
    <br>

</div>

            <div class="col-md-9">
            </div>

            <div class="col-md-3" style="float:right;">

                <!-- <a class="btn btn-primary" href="/"> Home </a> -->
                @auth  <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Blog Post</a> @endauth

            </div>


            <br>
            <br>
<!-- Start Error Display -->
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
<!-- End Error Display -->



<table class="table table-bordered">



<tr>
    <th>No</th>
    <th>Title</th>
    <th>Content</th>
    <th>Created</th>
    <th width="280px">Action</th>
</tr>


@foreach ($posts as $post)

<tr>
<td>{{ ++$i }}</td>
<td>{{ $post->title }}</td>
<td>{{ $post->content}}</td>
<td>{{ date('d-m-Y H:i', strtotime($post->created_at))}}</td>


<td>
@auth
  @if (auth()->user()->id==$post->author_id)

        <a class="btn btn-info" href="{{ route('posts.show',$post->postID) }}">Show</a>

        <a class="btn btn-primary" href="{{ route('posts.edit',$post->postID) }}">Edit</a>

        {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->postID],'style'=>'display:inline']) !!}

        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}

        {!! Form::close() !!}

   @endif
@endauth
</td>

</tr>

@endforeach

</table>

</div>
@endsection