@extends('layout')
  
@section('content')
<div class="container">
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Email Templates</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('templates.create') }}"> Create Template</a>
                    <a class="btn btn-primary" href="{{ route('mail') }}">Send Mail</a>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Template ID</th>
                    <th>Template Name</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                $i = 1
                @endphp
                @foreach ($templates as $template)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>TEMPLATEID-{{ $template->id }}</td>
                        <td>{{ $template->name }}</td>
                        <td>
                            <form action="{{ route('templates.destroy',$template->id) }}" method="Post">
                                <a class="btn btn-info" href="{{ route('templates.show',$template->id) }}">Show</a>
                                <a class="btn btn-primary" href="{{ route('templates.edit',$template->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
    