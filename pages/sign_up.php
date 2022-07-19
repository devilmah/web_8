<?php
require "../includes/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $config['title']; ?></title>

  <!-- Bootstrap Grid -->
  <link rel="stylesheet" type="text/css" href="/media/assets/bootstrap-grid-only/css/grid12.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

  <!-- Custom -->
  <link rel="stylesheet" type="text/css" href="/media/css/style.css">
</head>
<body>
    <div id="wrapper">

    <?php include "../includes/header.php";
    session_start();
    ?>
    <div id="content">
      <div class="container">
        <div class="row">
    <section class="content__left col-md-8">
        <div class="block">
    <div class="block" id="comment-add-form">
      <?php  if ($_SERVER['REQUEST_METHOD'] == 'GET') {
?>

            <h3>Регистрация</h3>
             <div class="block" id="comment-add-form">
                    <div class="block__content">
                <form action="sign_up.php" method="POST">
                
                  <div class="form__group">
                    <div class="row">
                      <div class="">
                        <input type="text" class="form-control " 
                          name="name" placeholder="Имя" value="">
                      </div>
                      <div class="form__group " >
                    <input type="submit" class="form-control mt-4 btn btn-dark"  value="Готово">
                  </div>
      </div>
                    </div>
                  </div>
                </form>
              </div>

<?php
}

else {
  $res = mysqli_query($connection,"SELECT count(*) FROM users WHERE name = '".$_POST['name']."'") or die();

$row = mysqli_fetch_row($res);
if ($row[0] > 0)
{
    echo("Пользователь с таким именем уже существует");
}
else
{
   $errors = array();
                    if( empty($_POST['name']))
                    {
                        $errors[]='Введите имя';

                    }
                    
                    
                    if(empty($errors))
                    {
                     $comb = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
                     $login = array(); 
                     $pass = array(); 
                     $combLen = strlen($comb) - 1; 
                     for ($i = 0; $i < 8; $i++) {
                          $n = rand(0, $combLen);
                          $m = rand(0, $combLen);
                          $login[] = $comb[$n];
                          $pass[] = $comb[$m];
                     }
                     
                     $login = implode($login); 
                     $pass = implode($pass); 
                      mysqli_query($connection,"INSERT INTO `users` (`name`,`login`,`pass`) VALUES ('".$_POST['name']."','".$login."','".md5($pass)."')");
                        echo ("<span>Регистрация прошла успешно. Ваш логин:  ".$login."  пароль:  ".$pass."</span>");
                    }else
                    {
                        echo $errors['0'];
                    }
}
    
}?>
              
            </div>
</div>
</section>
            <section class="content__right col-md-4">
            
                <?php include "../includes/sidebar.php" ?>
            
          </section>
          </div>
            </div>
            </div>
            
    <?php include "../includes/footer.php";?>


  </div>

</body>
</html>