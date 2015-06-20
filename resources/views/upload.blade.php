@extends('app')

@section('asset')
    <link href="{{ asset('/css/jquery.datetimepicker.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/jquery.datetimepicker.js') }}"></script>
    <link href="{{ asset('/css/cropper.min.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/cropper.min.js') }}"></script>
    <link href="{{ asset('/css/jquery.Jcrop.min.css') }}" rel="stylesheet">
    <script src="{{ asset('/js/jquery.Jcrop.min.js') }}"></script>
@stop
@section('content')
    @include('partials._script')

    <div class="container">
        <h3> Upload Artwork </h3>
        <hr>
        {!! Form::open(array('route' => 'upload', 'class'=>'form-horizontal', 'id' =>'formUpload', 'files' => true)) !!}
            {{--<div class="fileinput fileinput-new" data-provides="fileinput" style="width: 100%;">--}}
                {{--Button Upload--}}
                <div style="margin:50px auto;  text-align: center;" id="btnContainer">
                    <span class="btn btn-primary btn-file btn-success" >
                        <span class="upload"><i class="fa fa-plus"></i> &nbsp;Select image</span>
                        <input type="file" name="image" id="btnupload" style="display: none;">
                    </span>
                </div>
                {{--END Button Upload--}}
                    <div class="col-md-6 panel-white">
                        <div class="wrap-in">
                            <div id="input">
                                <input type="hidden" name="x" id="x"/>
                                <input type="hidden" name="y" id="y"/>
                                <input type="hidden" name="w" id="w"/>
                                <input type="hidden" name="h" id="h"/>

                                <div class="form-group">
                                    {!! Form::label('title', 'Title') !!}
                                    {!! Form::text('title',null,['class'=>'form-control', 'placeholder'=>'Artwork title']) !!}
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            {!! Form::label('category_id', 'Category') !!}
                                            {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
                                        </div>
                                        <div class="col-sm-6">
                                            {!! Form::label('style_id', 'Style') !!}
                                            {!! Form::select('style_id', $styles, null, ['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            {!! Form::label('dimension', 'Dimension') !!}
                                        </div>

                                        <div class="col-sm-3">
                                            {!! Form::text('width',null,['class'=>'form-control', 'placeholder'=>'Width']) !!}
                                        </div>
                                        <div class="col-sm-3">
                                            {!! Form::text('height',null,['class'=>'form-control', 'placeholder'=>'Height']) !!}
                                        </div>
                                        <div class="col-sm-3">
                                            {!! Form::text('dept',null,['class'=>'form-control', 'placeholder'=>'Dept']) !!}
                                        </div>
                                        <div class="col-sm-3">
                                            {!! Form::select('unit', array('0'=>'cm','1'=>'inch'), null, ['class'=>'form-control']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    {!! Form::label('material_id', 'Material') !!}
                                    {!! Form::select('material_id', $materials, null, ['class'=>'form-control']) !!}
                                </div>
                                <div class="form-group form-header">
                                    {!! Form::checkbox('is_auction', 1, 0, ['id'=>'cbAuction']) !!}
                                    {!! Form::label('is_auction', 'Is Auction') !!}
                                </div>
                                <div id="auction">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                {!! Form::label('start_date', 'Start Date') !!}
                                                {!! Form::text('start_date',null,['class'=>'form-control','id'=>'startdate']) !!}
                                            </div>
                                            <div class="col-sm-6">
                                                {!! Form::label('end_date', 'End Date') !!}
                                                {!! Form::text('end_date',null,['class'=>'form-control','id'=>'enddate']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                {!! Form::label('start_price', 'Start Price') !!}
                                                {!! Form::text('start_price',null,['class'=>'form-control','id'=>'disabledInput','disable']) !!}
                                            </div>
                                            <div class="col-sm-6">
                                                {!! Form::label('duplicate_price', 'Duplicate Price') !!}
                                                {!! Form::text('duplicate_price',null,['class'=>'form-control']) !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="price">
                                    <div class="form-group">
                                        {!! Form::label('price', 'Price') !!}
                                        {!! Form::text('price',null,['class'=>'form-control', 'placeholder'=>'Your price']) !!}
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::label('description', 'Description') !!}
                                    {!! Form::textarea('description',null,['class'=>'form-control', 'placeholder'=>'Description']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::submit('submit',['class'=>'btn btn-primary btn-success']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <img id="thumbnail" class="crop" style="width: 100%">
                        </div>
                        <h3 class="title-sub">Thumbnails</h3>
                        <div style="width:200px;height:200px;overflow:hidden;float:left;">
                            <img id="thumbnail-preview" class="preview">
                        </div>
                        <div style="width:100px;height:100px;overflow:hidden;float:left;margin-left:20px;">
                            <img id="thumbnail-preview-small" class="preview-small">
                        </div>
                    </div>

                </div>
            {!! var_dump($errors) !!}
        {!! Form::close() !!}
    {!! JsValidator::formRequest('App\Http\Requests\UploadRequest', '#formUpload'); !!}
    </div>


@stop