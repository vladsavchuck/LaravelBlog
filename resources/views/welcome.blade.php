<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="my-4">Posts</h1>

    <!-- Форма для додавання поста -->
    <form action="/posts" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Опублікувати</button>
    </form>

    <hr>

    <!-- Виведення всіх постів -->
    @foreach($posts as $post)
        <div class="card mb-2">
            <div class="card-body">
                <h5>{{ $post->title }}</h5>
                <p>{{ $post->content }}</p>

                <!-- Кнопка видалення -->
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Видалити</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
</body>
</html>
