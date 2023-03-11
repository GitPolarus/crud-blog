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

    <table border="1">
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Action</th>
        </tr>
        @foreach ($postlist as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
                <td>
                    {{-- <a href="/deletePost/{{ $post->id }}">Delete</a> --}}
                    <a href="/editPost/{{ $post->id }}">Edit</a>
                    <form action="/deletePost/{{ $post->id }}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>



    <a href="/addPost">Ajouter un nouveau Post</a>
</body>

</html>
