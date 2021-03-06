@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row mt-3 d-flex justify-content-center">
            <form action="{{route('store-subscriber')}}" method="post">
                <div class="col-md-4 m-auto">
                    <div class="col-md-12 text-center text-black-50 h2">Add a subscriber</div>
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Country</label>
                        <input type="text" name="country" class="form-control" required>
                    </div>
                    <div class="form-group mt-2">
                        <input type="submit" value="Add" class="btn btn-success btn-sm">&nbsp;
                        @include('layouts.messages')
                    </div>
                    <div class="form-group mt-2">
                        <a href="{{route('subscribers')}}" class="btn btn-primary p-2 col-md-12"><i class="fas fa-house-user"></i> Go to Home</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
