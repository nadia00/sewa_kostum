@extends('layouts.master')

@section('content')

    <div id="content">
        <div class="container">

            <div class="col-md-6 col-md-offset-3">
                <div class="box">
                    <h1>Login</h1>

                    <p class="lead">Already have an account?</p>
                    <p class="text-muted">Login to get all access in this website.</p>


                    <form action="customer-orders.html" method="post">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                        </div>
                    </form>
                </div>
            </div>




        </div>
        <!-- /.container -->
    </div>
    <!-- /#content -->

@endsection