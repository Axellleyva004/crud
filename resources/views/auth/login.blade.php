@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        
                            <div class="card-body">
                                <a class="btn btn-primary" href="/login/facebook">
                                    Facebook Login
                                </a>
                            </div>
                    </form>

                </div>

            </div>

        </div>
        <div class="card">

        </div>
    </div>
</div>
@endsection