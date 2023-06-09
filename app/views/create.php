<?php $this->layout('viewIndex', ['title' => 'Registrar Usuário']); ?>

<h2 class="h2_header">Cadastrar Usuário</h2>
<br>

<?php echo getFlash('message', 'color:red');?>

<form action="/user/store" method="post">

    <?php echo getCsrf(); ?>

    <div class="box">
        <label for="name">Nome</label>
        <input type="text" class="form-control" name="name" placeholder="Seu nome..." value="<?php echo getOld("name")?>">
        <?php echo getFlash('name', 'color:red');?>
    </div>

    <div class="box">
        <label for="lastname">Sobrenome</label>
        <input type="text" class="form-control" name="lastname" placeholder="Seu sobrenome..." value="<?php echo getOld("lastname")?>">
        <?php echo getFlash('lastname', 'color:red');?>
    </div>

    <div class="box">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" placeholder="Seu melhor email..." value="<?php echo getOld("email")?>">
        <?php echo getFlash('email', 'color:red');?>
    </div>

    <div class="box">
        <label for="password">Senha</label>
        <input type="password" class="form-control" name="password" placeholder="Sua senha..." >
        <?php echo getFlash('password', 'color:red');?>
    </div>

    <button class="login_button">Create</button>

</form>