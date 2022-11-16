<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
    <title>Registro</title>
</head>
<body>
    <div id="login">
        <h3 class="text-center text-white pt-5">Registro</h3>
        <div class="container">
        <div id="login-row" class="row justify-content-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form action="" method="post" id="id" class="form">
                            <h3 class="text-center text-info">Cadastro</h3>
                            <div class="form-group">
                                <label for="" class="text-info">Usuário</label>
                                <input type="text" name="username" class="form-control" id="username" REQUIRED>
                            </div>
                            <div class="form-group">
                                <label for="" class="text-info">Senha:</label>
                                <input type="password" name="password" class="form-control" id="password" REQUIRED>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="RegisterSubmit" value="Acessar" class="btn btn-info">
                            </div>
                            <div id="reg_link" class="text-right">
                                <a href="?login=true" class="text-info">Login</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>