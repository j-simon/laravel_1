<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Form</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <h1>Enter User Details</h1>

    <form action="{{ route('user.store') }}" method="POST">

        @csrf

        <label for="name">Name:</label>
        <input type="text" id="name" name="name">

        @if ($errors->has('name'))
            <div class="error">{{ $errors->first('name') }}</div>
        @endif

        <br>

        <label for="email">Email:</label>
        <input type="text" id="email" name="email">

        @if ($errors->has('email'))
            <div class="error">{{ $errors->first('email') }}</div>
        @endif

        <br>

        <button type="submit">Submit</button>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

</body>

</html>
