<!DOCTYPE html>
<htmt lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blade-Test</title>
</head>
<body>
    
    <h1>Datenschutz</h1>
    <div>{{ $text }}</div>
    <div>{!! $text2 !!}</div>


    <!-- Conditional statement in Blade -->

    {{-- <?php // php Welt
    if(true) ?>
        <p>Welcome, Admin!</p>
  <?php
    elseif($user->isEditor)
        <p>Welcome, Editor!</p>
    else
        <p>Welcome, User!</p>
    endif
    ?> --}}

    @if(true)
        <p>Welcome, Admin!</p>
    @elseif($user->isEditor)
        <p>Welcome, Editor!</p>
    @else
        <p>Welcome, User!</p>
    @endif


</body>
</html>