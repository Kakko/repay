<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repay - Reembolsos</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>assets/css/login.css">
</head>
<body>
    <div class="login-area">
        <div class="login-info">
            <div class="brand">
                <img src="<?php echo BASE_URL; ?>assets/images/icons/ppay-icon.png">
                <span>Repay</span> 
            </div>
            <div class="login-form">
                <span id="login_title">Log In</span>
                <form method="POST">
                    <label>E-mail do Usuário:</label>
                    <div class="input-mb">
                        <div class="user_icon"></div>
                        <div class="email_input">
                            <input type="mail" name="email" autocomplete="off">
                        </div>
                    </div>
                    <label>Senha:</label>
                    <div class="input-mb">
                        <div class="pass_icon"></div>
                        <div class="pass_input">
                            <input type="password" name="password" id="passdata">
                        </div>
                        <div class="hidden_icon exibir" onclick="showPassword(this)"></div>
                    </div>
                    <input type="submit" class="btn" value="ENTRAR">
                    <span id="forg_pass">Esqueci a Senha</span>
                </form>
            </div>
            <div class="logo_mb">
                <img src="<?php echo BASE_URL; ?>assets/images/logo_mb.png">
            </div>
        </div>
        <div class="login-bg"></div>
        <div class="login-bg-mask"></div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/login.js"></script>
</html>
