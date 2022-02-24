<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
    <div class="span3 well">
        <legend>Login to your account</legend>
      <form accept-charset="UTF-8" action="/login" method="post">
        @csrf
          <input class="span3" name="email" placeholder="email" type="email">
          <input class="span3" name="password" placeholder="Password" type="password"> 
          <button class="btn btn-warning" type="submit">Login</button>
      </form>
  </div>
</body>
</html>