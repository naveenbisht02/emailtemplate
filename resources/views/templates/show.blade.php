@extends('layout')
  
@section('content')
<div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Show Template</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('templates.index') }}"> Back</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Template Name:</strong>
                     {{ $template->name }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Template:</strong>
                     {!! $template->etemplate !!}
                </div>
            </div>
        </div>
    </div>
@endsection
