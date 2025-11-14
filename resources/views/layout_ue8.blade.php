<!-- Master layout with yield placeholders -->
<!DOCTYPE html>
<html>
<head>
    <title>Profil-Seite</title>
</head>
<body>
   
     <div>@yield('name')</div>
     <div>@yield('alter')</div>
     <div>@yield('bio')</div>
     Hobbies
     <div>@yield('hobbies')</div>
   
</body>
</html>