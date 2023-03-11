<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Post</title>
</head>

<body>
    <h1>Edit Post</h1>
    <form method="POST" action="/updatePost/{{ $post->id }}">
        @csrf
        @method('put')
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ $post->title }}">
        </div>
        <div>
            <label for="content">Content</label>
            <textarea type="text" name="content" id="content">{{ $post->content }}</textarea>
        </div>

        <div>
            <input type="submit" value="Save">
        </div>
    </form>
</body>

</html>
