<?php
require_once $_SERVER['DOCUMENT_ROOT'].'../includes/config.php';
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

    <?php require_once $_SERVER['DOCUMENT_ROOT'].'../includes/header.php';
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
                
                <form action="sign_in.php" method="POST">
                
                  <div class="form__group">
                        <input type="text" class="form-control mb-4" 
                          name="login" placeholder="Логин" value="">

                        <input type="text" class="form-control mb-4" 
                          name="pass" placeholder="Пароль" value="">
                      <div class="form__group">
                    <input type="submit" class="form-control btn btn-dark"  value="Готово">
                  </div>
                      

                </form>
              </div>
      </div>

<?php

}

else {
  $res = mysqli_query($connection,"SELECT count(*) FROM users WHERE login = '".$_POST['login']."'") or die();

$row = mysqli_fetch_row($res);
if ($row[0] <= 0)
{
    echo("Пользователя с таким логином не существует");
}
else
{
   $errors = array();
                    if( empty($_POST['login']))
                    {
                        $errors[]='Введите логин';

                    }
                    if( empty($_POST['pass']))
                    {
                        $errors[]='Введите пароль';

                    }
                    if(empty($errors))
                    {
                    $res = mysqli_query($connection,"SELECT count(*) FROM users WHERE pass = '".md5($_POST['pass'])."'") or die();
                    $row = mysqli_fetch_row($res);
                    if ($row[0] <= 0)
                    {
                        echo("Неверный пароль");
                    }else{
                        echo("Авторизация прошла успешно");
                        $_SESSION['login'] = $_POST['login'];
                        $res1 = mysqli_query($connection,"SELECT name FROM users WHERE login = '".$_POST['login']."'") or die();
                        $user = mysqli_fetch_assoc($res1);
                        $_SESSION['name'] = $user['name'];
                    }
                      
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
            
                <?php require_once $_SERVER['DOCUMENT_ROOT'].'../includes/sidebar.php' ?>
            
          </section>
          </div>
            </div>
            </div>
            
    <?php require_once $_SERVER['DOCUMENT_ROOT'].'../includes/footer.php';?>


  </div>

</body>
</html>