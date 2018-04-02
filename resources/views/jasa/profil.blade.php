<!DOCTYPE html>
<html>
    <body>
        <button><a href=" {{ url('/jasa/logout') }} ">Logout</a></button>
        
        <h1>Profil Jasa</h1> 
        @foreach($data[0] as $val)
        {{$val}}<br>
        @endforeach
    </body>
</html>