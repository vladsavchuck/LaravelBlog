<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel CRUD Blog</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="my-4 text-center">LaravelBlog</h1>

    <!-- Форма для додавання поста -->
    <form action="/posts" method="POST" class="mb-4">
        @csrf
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" class="form-control" name="title" id="title" required>
        </div>
        <div class="form-group">
            <label for="content">Контент</label>
            <textarea class="form-control" name="content" id="content" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Опублікувати</button>
    </form>

    <hr>

    <!-- Виведення всіх постів -->
    @foreach($posts as $post)
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">{{ $post->title }}</h5>
                <p class="card-text">{{ $post->content }}</p>
                <p class="card-text"><small class="text-muted">Дата: {{ $post->created_at->format('d.m.Y H:i') }}</small></p>

                <!-- Кнопки редагування та видалення -->
                <div class="d-flex justify-content-between">
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Видалити</button>
                    </form>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Редагувати</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
</body>
</html>
