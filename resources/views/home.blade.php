<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    @auth
    <p style="border: 2px solid black; padding: 25px">
        Congrats you are logged in!
    </p>
    <form action="/logout" method="POST">
        @csrf
        <button class="btn btn-secondary ms-3">Log out</button>
    </form>
    <div style="border: 1.5px solid black; padding: 25px">
        <h2>Create a new post</h2>
        <form action="/create-post" method="POST">
            @csrf
            <label for="exampleFormControlInput1" class="form-label">Post Title</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="Post Title">
            <label for="exampleFormControlTextarea1" class="form-label">Write your post...</label>
            <textarea name="body" placeholder="Write your post..." class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            <button class="btn btn-dark">Create Post</button>
        </form>
    </div>

    <div style="border: 1.5px solid black; padding: 25px">
        <h2>All Posts</h2>
        @foreach($posts as $post)
            <div style="background-color:rgb(233, 224, 224); padding:10px; margin:3px">
                <h3>{{$post['title']}} by {{$post->user->name}}</h3>
                <p> {{$post['body']}} </p>
                <button class="btn btn-dark mb-2"><a href="/edit-post/{{$post->id}}" class="text-light">Edit</a></button>
                <form action="/delete-post/{{$post->id}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
    @else
    <div style="border: 1.5px solid black; padding: 25px;">
        <h2>Register</h2>
        <form action="/register" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Name">
            <input type="email" name="email" placeholder="Email">
            <input type="password" name="password" placeholder="Password">
            <button type="submit" class="btn btn-success">Register</button>
        </form>
    </div>
    <div style="border: 1.5px solid black; padding: 25px;">
        <h2>Log In</h2>
        <form action="/login" method="POST">
            @csrf
            <input type="text" name="loginname" placeholder="Login Name">
            <input type="password" name="loginpassword" placeholder="Password">
            <button type="submit" class="btn btn-primary">Log In</button>
        </form>
    </div>
    @endauth
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>