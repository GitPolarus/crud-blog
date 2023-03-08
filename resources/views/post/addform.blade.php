<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout Post</title>
</head>

<body>
    <h1>Add Post</h1>
    <form method="POST" action="/savePost">
        @csrf
        <div>
            <label for="title">Title</label>
            <input type="text" name="title" id="title">
        </div>
        <div>
            <label for="content">Content</label>
            <textarea type="text" name="content" id="content"></textarea>
        </div>
        <div>
            <label for="photo">Photo</label>
            <input type="file" name="photo" id="photo">
        </div>
        <div>
            <input type="submit" value="Save">
        </div>
    </form>
</body>

</html>
