@extends('layouts.main')

@section('main')

<div class="account-main">
    <div class="container">
        <div class="row">
            <div class="login-main">
                <h1 class="text-center">Login</h1>
                <div class="login-form" style="border-left: none">
                    @if (session('status-success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status-success') }}
                        </div>
                    @endif
                    <form action="{{route('postlogin')}}" method="POST" role="form">
                    @csrf
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="" id="input" value="remember" value="1">
                                        Remember Account
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 pull-right fg-pass">
                            <a data-toggle="modal" href='#modal-id'>Forgot Your Password ?</a>
                        </div>

                        <button type="submit" class="btn btn-primary">Login</button>
                        <a href="{{route('index')}}" type="submit" class="btn btn-danger">Cancel</a>
                    </form>
                    <h5>Doesn't have an Account? <a href="{{route('customer_register')}}">Register Now</a></h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade forgot-pass-modal" id="modal-id">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Retrieve Password</h4>
            </div>
            <div class="modal-body">
                <h5>Please enter the email address that have been registered</h5>
                <form action="" method="POST" class="form-inline" role="form">
                
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Email Address">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

@stop