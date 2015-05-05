<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Receptionist</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="../../css/bootstrap.min.css">
        <link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../../css/custom.css" />
    </head>
    <body class="row">
        <div class="col-md-5 lev1index">
            <div><?php
                if (!empty($_GET['message'])) {
                    echo $_GET['message'];
                } else {
                    echo 'Log in to continue';
                }
                ?></div>
            <div>
                <form role="form" method="post" action="process.php">
                    <div class="form-group">
                        <label for="email">Enter Email</label>
                        <div class="input-group">
                            <input type="email" class="form-control" id="inputEmailFirst" name="email"  placeholder="Enter Email" required="" >
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="password">Password </label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="inputEmailFirst" name="password" placeholder="**********" required="" >
                            <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                        </div>
                    </div>
                    <input type="submit" value="login" class="btn btn-info" role="button"/>
                </form>
            </div>
        </div>
    </body>
</html>
