<h2 class="h2_header">Cadastrar Usuário</h2>

<br>

<form action="/user/store" method="post">

    <div class="box">
        <label for="name">Nome</label>
        <input type="text" class="form-control" name="name" placeholder="Seu nome..." >
    </div>

    <?php echo getFlash('name', 'color:red');?>

    <div class="box">
        <label for="lastname">Sobrenome</label>
        <input type="text" class="form-control" name="lastname" placeholder="Seu sobrenome...">
    </div>

    <?php echo getFlash('lastname', 'color:red');?>

    <div class="box">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" placeholder="Seu melhor email...">
    </div>

    <?php echo getFlash('email', 'color:red');?>

    <div class="box">
        <label for="password">Senha</label>
        <input type="password" class="form-control" name="password" placeholder="Sua senha...">
    </div>

    <?php echo getFlash('password', 'color:red');?>

    <button class="login_button">Create</button>

</form>