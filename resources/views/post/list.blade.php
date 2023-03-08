<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Post</title>
</head>

<body>
    <h1>List of posts</h1>
    <ul>
        @foreach ($postlist as $post)
            <li>
                <strong>{{ $post->title }}</strong>
                <em>{{ $post->content }}</em>
            </li>
        @endforeach
    </ul>
</body>

</html>
