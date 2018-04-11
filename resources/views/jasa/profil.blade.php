<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
             
    <body>
        <button><a href=" {{ url('/jasa/logout') }} ">Logout</a></button>
        
        <h1>Profil Jasa</h1> 
        {{session('nama_pemilik')}}<br>
        {{session('telp')}}<br>
        {{session('username')}}<br>
        {{session('email')}}
        
        <br><br>

        <button>Edit Data</button>
        <form>
            <input type="text" name="email">
            <input type="text" name="username">
        </form>
    </body>
</html>