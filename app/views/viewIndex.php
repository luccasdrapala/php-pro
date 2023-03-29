<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$data['title']?></title>

    <link rel="stylesheet" href="/assets/css/styles.css">

</head>
<body>

    <div class="header">
        <?php require 'includes/header.php';?>
    </div>

    <div class="container">
        <?php require ROOT. '/app/views/'. $data['view']?>
    </div>
    
</body>
</html>