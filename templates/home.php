<!DOCTYPE html>
<html lang="en">
 <title>Fabrica</title>
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<body>

    <div class="container-fluid">
        
        <div style="padding-top:100px"></div>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <div class="panel" style="border:#ccc 1px solid">
                    <div class="panel-heading" style="text-align:center"><h2>Login</h2></div>
                    <div class="panel-body">
                        <form role="form" action="http://localhost/fabrica/securit" method="post">
                              <div class="form-group">
                                <label for="email">Username:</label>
                                <input type="text" class="form-control" name="user" placeholder="Tipe here your username " required="">
                              </div>
                              <div class="form-group">
                                <label for="pwd">Password:</label>
                                <input type="password" class="form-control" name="pass"placeholder="Tipe here your password" required="">
                              </div>

                              <button type="submit" class="btn btn-block">Login</button>
                              
                        </form>
                        <div style="text-align: center; margin-top: 15px">
                            
                                      <?php
                                       echo isset($name)? $name: null;
                                      ?>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4"></div>
        </div>
        
    </div>
    
</body>
</html> 