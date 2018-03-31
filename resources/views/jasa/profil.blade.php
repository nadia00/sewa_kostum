<!DOCTYPE html>
<html>
    <body>
        <h1>Profil Jasa</h1>
        <hr>
        
        $foreach ($data as $jasa)
        
        <p>{{ $jasa->email }}</p>
        $endforeach
    </body>
</html>