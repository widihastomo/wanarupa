
{!! Form::open(array('route' => '', 'class'=>'form-horizontal', 'files' => true)) !!}
<div class="form-group">
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title',null,['class'=>'form-control', 'placeholder'=>'Artwork title']) !!}
</div>
{!! Form::close() !!}