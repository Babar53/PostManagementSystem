@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Users') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
<div class="container">
    <a href="{{ route('posts.create') }}" class="btn btn-primary">Create Post</a>
</div>
                        <table class="table table-bordered table-hover">
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                            @foreach ($posts as $posts)
                                <tr>
                                    <td>{{ $posts->id }}</td>
                                    <td>{{ $posts->name }}</td>
                                    <td>{{ $posts->email }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
