<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">
            <strong>Post Title:</strong>
            <br>
            {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}
        </div>

         <br>
        
        <div class="form-group">
            <strong>Post Content:</strong>
            <br>
            {!! Form::textarea('content', null, array('placeholder' => 'Content','class' => 'form-control', 'width' => '500px', 'height'=>'500px')) !!}
        </div>
         

    </div>


    <br>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
       <br>
            <button type="submit" class="btn btn-primary">Submit</button>

    </div>

</div>