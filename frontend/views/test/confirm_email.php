<?php
use yii\helpers\Url;
?>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/email.css">
</head>
<body>    
    <div id="wrapper">
        <div class="container">
            <header>
                <div class="logo">MY TENDER</div>
            </header>
            <div class="content">
                <h1>Поздравляем!<b>
                <div class="name">
                    <br/><b>Здравствуйте, <?= $model->name ?></b><br/>
                </div> 
                <div class="data-registration">
                    <div class="login"><span>Ваш логин:</span> <?= $model->email ?></div><br>
                    <div class="password"><span>Ваш пароль:</span> <?= $password ?></div>
                </div>
                <div class="link">
                    <p>Для подтверждения e-mail и продолжения регистрации перейдите по ссылке:<br>
                    <a href="<?= Url::home(true) ?>test/confirm/?id=<?= $registrationToken ?>">
                        <?= Url::home(true) ?>test/confirm/?id=<?= $registrationToken ?></a></p>
                </div>
            </div>
        </div>
    </div>    
</body>
</html>