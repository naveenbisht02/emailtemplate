@extends('layout')
  
@section('content')
<div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left mb-2">
                    <h2>Send Mail</h2>
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
                        <strong>Template ID:</strong>
                        <select name="id" class="form-control form-control-md" required>
                        	@foreach($templates as $template)
                        	<option value="{{ $template->id }}">TEMPLATEID-{{ $template->id }}</option>
                        	@endforeach
                        </select>
                        @error('id')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Email ID:</strong>
                        <input type="email" name="email" class="form-control" placeholder="Email ID" required>
                        @error('email')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>To Name:</strong>
                        <input type="text" name="toname" class="form-control" placeholder="To Name" required>
                        @error('toname')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary ml-3">Send</button>
                </div>
            </div>
        </form>
    </div>
@endsection
