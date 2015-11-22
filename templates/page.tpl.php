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
    
    <script src="js/dist/app_all.js"></script>
    
</head>
<body ng-app="servicesApp">
    <div class="container">
        
        <div class="panel panel-default">
            <div class="panel-body">
                
                <div class="pull-right">
                    <a href="<?php echo $_SERVER['REQUEST_URI']; ?>logout">Выйти</a>
                </div>
                
                <h1>SO-Admin Bulk service Edit</h1>
                
                <h4>Редактирование сервисов</h4>
                
                <hr>
                
                <div ng-controller="MainController">
                    
                    <div ng-view></div>
                    
                </div>
                
            </div>
        </div>

    </div>
    
</body>
</html>