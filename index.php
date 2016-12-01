<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/keuzedelen/bootstrap/css/bootstrap.min.css"  />
        <link rel="stylesheet" type="text/css" href="/keuzedelen/style.css" media="screen" />
    </head>
    
    <body>
        <div class="login">
                <div class="heading">
                    <form role="form" class="login" action="login.php" autocomplete="off" method="POST">
                        <div class="input-group input-group-lg">
                          <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" class="form-control" name="email" placeholder="Email">
                        </div>
                        <span class="help-block"></span>

                        <div class="input-group input-group-lg">
                          <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input  type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <span class="help-block"></span>
                        <a href="register.php" class="btn btn-lg btn-default btnwidth btn-fixpos">Registreren</a>
                        <button class="btn btn-lg btn-default btnwidth" name="submit" type="submit">Login</button>
                        
                    </form>
            	</div>
        </div>
  </body>
 </html>
