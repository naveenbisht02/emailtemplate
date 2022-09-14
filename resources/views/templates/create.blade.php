@extends('layout')
  
@section('content')
<div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Create Template</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('templates.index') }}"> Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
        @endif
        <form action="{{ route('sendmail') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Template Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Template Name" required>
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Template:</strong>
                        <textarea id="editor" class="ckeditor form-control" name="etemplate" required></textarea>
                        @error('template')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary ml-3">Save Template</button>
                </div>
            </div>
        </form>
    </div>
@endsection
