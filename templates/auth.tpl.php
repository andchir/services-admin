<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    
    <link href="lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    
    <script src="lib/jquery/dist/jquery.min.js"></script>
    <script src="lib/bootstrap/dist/js/bootstrap.min.js"></script>
    
</head>
<body>
    <div class="container">

        <div class="row">
            <div class="col-md-offset-3 col-md-6">
                
                <div class="panel panel-default panel-auth">
                    <div class="panel-heading">
                        Авторизация
                    </div>
                    <div class="panel-body">
                        
                        <form id="loginForm" role="form" action="<?php echo $app["request"]->getBaseUrl(); ?>/auth" method="post">
                            
                            <?php if( !empty( $data['errors'] ) ): ?>
                                <?php foreach($data['errors'] as $msg): ?>
                                <div class="alert alert-danger">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <span class="glyphicon glyphicon-info-sign"></span>
                                    <?php echo $msg; ?>
                                </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input id="login-username" type="text" class="form-control floating-label" name="username" value="<?php echo $data['username']; ?>" placeholder="Имя пользователя" required>                                        
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input id="login-password" type="password" class="form-control floating-label" name="password" placeholder="Пароль" required>
                                </div>
                            </div>
                            
                            <div class="form-controls">
                                <div class="controls">
                                    <button class="btn btn-primary btn-block" type="submit">
                                        <span class="glyphicon glyphicon-ok"></span>
                                        Войти
                                    </button>
                                </div>
                            </div>
                            
                        </form>
                        
                    </div>
                </div>
                
            </div>
        </div>

    </div>
    
</body>
</html>