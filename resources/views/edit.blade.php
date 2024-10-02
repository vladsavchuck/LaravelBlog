<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редагування Поста</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="my-4">Редагування Поста</h1>

    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $post->title }}" required>
        </div>
        <div class="form-group">
            <label for="content">Контент</label>
            <textarea class="form-control" name="content" id="content" rows="3" required>{{ $post->content }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Зберегти</button>
    </form>
</div>
</body>
</html>
