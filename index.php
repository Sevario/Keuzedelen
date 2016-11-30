<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/keuzedelen/bootstrap/css/bootstrap.min.css"  />
        <link rel="stylesheet" type="text/css" href="/keuzedelen/style.css" media="screen" />
    </head>
    
    <body>
        <form role="form" class="login" action="login.php" autocomplete="off" method="POST">
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="text" class="form-control" name="email" placeholder="Email">
            </div>
            <span class="help-block"></span>

            <div class="form-group">
                <label for="pwd">Password:</label>
                <input  type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <span class="help-block"></span>

            <button class="btn btn-default" name="submit" type="submit">Login</button>
        </form>
  </body>
 </html>
