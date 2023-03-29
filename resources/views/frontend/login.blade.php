@extends('frontend.layouts.master')

@push('css')
<style>
    .form-header {
        position: static;
        margin: 50px 0;
    }

    .form-container {
        position: static;
        width: 50%;
        margin: 0 auto;
        padding: 15px;
    }
    .form-container h2{
        margin-bottom: 25px;
    }
    .form-row{
        margin-bottom: 34px;
    }
    input.normal{
        font-size: 20px;
    }
    input.button{
        margin-bottom: 15px;
    }
    @media screen and (max-width: 1200px){
        .form-container{
            width: 90%;
        }
    }
    a.aa:hover {
        color: white;
    }
</style>
@endpush

@section('content')
<div class="container">
    <div class="row">
        <div class=" form-header">
            <div class="form-container">
                <h2>Login</h2>
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-row">
                            <input type="email" name="email" placeholder="Email Address" class="normal">
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-row">
                            <input type="password" name="password" placeholder="Password" class="normal">
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <input type="submit" class="button" value="Submit">
                        </div>
                        <br>
                        <h5>
                            <span style="color: #2f5071; padding-left: 15px;">Don't have an account?
                                <a style="color: #2f5071;" class="aa" href="{{ route('home') }}">Signup</a>
                            </span>
                        </h5>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
