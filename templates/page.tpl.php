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

        <div class="panel panel-default">
            <div class="panel-body">
                
                <h1>SO-Admin Bulk service Edit</h1>
                
                <h4>Редактирование сервисов</h4>
                
                <hr>
                
                <div class="row">
                    <div class="col-md-6">
                        
                        <h5>Добавить новый сервис</h5>
                        
                        <form id="addForm" role="form" action="<?php echo $app["request"]->getBaseUrl(); ?>" method="post">
                            
                            <div class="row">
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label for="createFormInputIDP">IDP:</label>
                                        <input type="number" class="form-control" id="createFormInputIDP">
                                    </div>
                                    
                                </div>
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label for="createFormInputLogin">Login:</label>
                                        <input type="text" class="form-control" id="createFormInputLogin">
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-primary">Создать</button>
                                </div>
                            </div>
                            
                        </form>
                        
                    </div>
                    <div class="col-md-6">
                        
                        <h5>Удалить севис по IDP</h5>
                        
                        <form id="removeForm" role="form" action="<?php echo $app["request"]->getBaseUrl(); ?>" method="post">
                            
                            <div class="row">
                                <div class="col-md-6">
                                    
                                    <div class="form-group">
                                        <label for="createFormInputIDP">IDP:</label>
                                        <select class="form-control">
                                            
                                        </select>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-danger">Удалить</button>
                                </div>
                            </div>
                            
                        </form>
                        
                    </div>
                </div>
                
                <hr>
                
                
                
            </div>
        </div>

    </div>
    
</body>
</html>