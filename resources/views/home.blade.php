<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    @auth
    <p style="border: 2px solid black; padding: 25px">
        Congrats you are logged in!
    </p>
    <form action="/logout" method="POST">
        @csrf
        <button>Log out</button>
    </form>
    @else
    <div style="border: 1.5px solid black; padding: 25px;">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Name">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <button type="submit">Register</button>
        </form>
    </div>

    @endauth
</body>
</html>