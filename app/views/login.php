<h2 class="h2_header">Login</h2>
<?php 
    echo getFlash('message', 'color:red');
?>
<br>

<form action="/login" method="post">
    <div class="box">
        <label for="email">Digite seu email:</label><br>
        <input type="email" name="email" id="email"><br>
    </div>
    <div class=box>
        <label for="password">Digite sua senha:</label><br>
        <input type="password" name="password" id="password"><br>
    </div>
    <button class="login_button" type="submit">Login</button>
</form>