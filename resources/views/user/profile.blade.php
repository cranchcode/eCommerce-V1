<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
    <div class="span3 well">
        <legend>Edit Your Page {{ $user->username }}</legend>
      <form accept-charset="UTF-8" action="/profile/edit" method="post">
        @csrf
          <input class="span3" name="username" value="{{ $user->username }}" type="text"> 
          <input class="span3" name="email" value="{{ $user->email }}" type="text">
          <input class="span3" name="password" placeholder="Current Password" type="password"> 
          <button class="btn btn-warning" type="submit">Edit</button>
      </form>
    </div>

    <div class="span3 well">
        <legend>Delete Your Page</legend>
      <form accept-charset="UTF-8" action="/profile/delete" method="post">
        @csrf
          <input class="span3" name="password" placeholder="Current Password" type="password"> 
          <button class="btn btn-warning" type="submit">Delete</button>
      </form>
    </div>
</body>
</html>