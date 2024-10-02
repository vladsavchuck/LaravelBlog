<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5">Posts</h1>
        <form action="{{ route('posts.store') }}" method="POST" class="mb-4">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea name="content" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Post</button>
        </form>

        <h2>All Posts</h2>
        <ul class="list-group">
            @foreach($posts as $post)
                <li class="list-group-item">
                    <h5>{{ $post->title }}</h5>
                    <p>{{ $post->content }}</p>
                </li>
            @endforeach
        </ul>
    </div>
</body>
</html>
