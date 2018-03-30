<!DOCTYPE html>
<html>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">Login Jasa</div>

                        <div class="panel-body">
                            <form class="form-horizontal" method="POST" action="{{ route('login.jasa.submit') }}">
                                {{ csrf_field() }}
                                
                                <input type="email" name="email" placeholder="email">
                                <input type="password" name="password" placeholder="password">

                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
