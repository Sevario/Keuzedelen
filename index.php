<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/keuzedelen/bootstrap/css/bootstrap.min.css"  />
        <link rel="stylesheet" type="text/css" href="/keuzedelen/style.css" media="screen" />
    </head>
    
    <body>
        <form role="form" class="login" action="login.php" autocomplete="off" method="POST">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="login_user" name="email" placeholder="Email">
            </div>
            <span class="help-block"></span>

            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input  type="password" class="login_password" name="password" placeholder="Password">
            </div>
            <span class="help-block"></span>

            <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Login</button>
        </form>
  </body>
 </html>
