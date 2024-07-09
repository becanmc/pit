
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">

        <h1 class="form-group"> Entre em contato conosco! </h1>
        <form action="contact.php" method="post">
            <div class="form-group">
                <label for="nome"> Nome </label>
                <input type="text" placeholder="Seu nome" name="nome" class="form-control">
            </div>
            <div class="form-group">
                <label for="email"> Email </label>
                <input type="email" placeholder="Seu email" name="email" class="form-control">
            </div>
            <div class="form-btn form-group">
                <label for="assunto"> Assunto </label>
                <input type="text" placeholder="Assunto" name="assunto" class="form-control">
            </div>
            <div class="form-btn form-group">
                <label for="mensagem"> Mensagem </label>
                <textarea name="mensagem" class="form-control" placeholder="Sua mensagem "></textarea>
            </div>

            <div class="form-btn form-group">
                <button type="submit" name="send-email" class="btn btn-primary"> Enviar email! </button>
            </div>
                    
        </form>
        
    </div>
</body>
</html>