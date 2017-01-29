<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>RSS-aggregator</title>

        <script src="https://code.jquery.com/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head><!--/head-->

    <body>
        <div class="alert alert-info" role="alert"> <!-- header -->
            <div class="cal-md-9 col-md-offset-2">
                <p>nic4NV@yandex.ru</p>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-2">
                    <a href="/"><h1>RSS-aggregator</h1> </a>
                </div>
                <div class="col-md-2">
                    <ul class="nav navbar-nav">                                    

                        <?php if (User::isGuest()): ?>
                            <li><a href="/user/login/"><i class="fa fa-lock"></i> Вход</a></li>
                            <li><a href="/user/register/"><i class="fa fa-lock"></i> Регистрация</a></li>
                        <?php else: ?>
                            <li><a href="/user/logout/"><i class="fa fa-unlock"></i> Выход</a></li>
                            <?php endif; ?>
                    </ul>
                    
                   
                </div>
            </div>
        </div>  <!-- end header -->
