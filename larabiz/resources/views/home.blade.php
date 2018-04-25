@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
            <hr/>
            <div class="card">
                <div class="card-header">Listings</div>
                <div class="card-body">
                    @foreach($listings as $listing)
                        <p>{{$listing->name}}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
