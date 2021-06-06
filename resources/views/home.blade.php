@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        <form action="{{ route('email.send') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <textarea type="text" class="form-control" name="email_body"
                                    placeholder="Enter your message here..."></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
