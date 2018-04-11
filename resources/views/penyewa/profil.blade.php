<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
             
    <body>
        <button><a href=" {{ url('/penyewa/logout') }} ">Logout</a></button>
        
        <h1>Profil Penyewa</h1> 
        @foreach($data[0] as $val)
        {{$val}}<br>
        @endforeach
    </body>
</html>