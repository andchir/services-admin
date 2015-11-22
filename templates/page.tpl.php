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
    <script src="lib/angular/angular.min.js"></script>
    <script src="lib/angular-sanitize/angular-sanitize.min.js"></script>
    <script src="lib/angular-route/angular-route.min.js"></script>
    <script src="lib/angular-resource/angular-resource.min.js"></script>
    
    <script src="js/services.js"></script>
    <script src="js/app.js"></script>
    <script src="js/controllers/main_controller.js"></script>
    <script src="js/controllers/view_controller.js"></script>
    <script src="js/controllers/edit_controller.js"></script>
    
</head>
<body ng-app="servicesApp">
    <div class="container">

        <div class="panel panel-default">
            <div class="panel-body">
                
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