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

    <?php include "../includes/header.php"?>

    <div id="content">
      <div class="container">
        <div class="row">
          <section class="content__left col-md-8">
            <div class="block">
              <?php
                  if (!empty($_SESSION['login'])) {
              ?>
              <h3>Обо мне</h3>
              <div class="block__content">
                <?php 
              $photos = mysqli_query($connection,"SELECT img FROM `users` WHERE `login` ='".$_SESSION['login']."'");
              $photo= mysqli_fetch_assoc($photos);?>
                <img src="../uploads/<?php print $photo['img'] ?>" style = "max-width:100%;">

                <div class="full-text">
         <h1><?php print $_SESSION['name']?></h1>
         <?php
         $descriptions = mysqli_query($connection,"SELECT descr FROM `users` WHERE `login` ='".$_SESSION['login']."'");
              $desc= mysqli_fetch_assoc($descriptions);?>
         
         <p><?php print $desc['descr'] ?></p>

         <form action="" method="post">
                <button class="btn btn-dark me-5"><a href="/pages/change.php">Изменить профиль</a></li></button>
                <button type="submit" class="btn btn-dark">Выход</button>
              </form>

            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
              session_destroy();
              header('Location: ./about_me.php');
}
          }else{
            ?>
             <h3>NoName</h3>
              <div class="block__content">
                <img src="/media/images/noname-image.jpg" style = "max-width:100%;">

                <div class="full-text">

<h2>Присоединяйтесь</h2>
<button class="btn btn-dark me-5"><a href="/pages/sign_up.php">Регистрация</a></li></button>
<button class="btn btn-dark me-5"><a href="/pages/sign_in.php">Авторизация</a></li></button>
<h1>Мы</h1>
<p>Блог о массовой культуре и эстетике.</p> <?php }?>


<h2>Сrazy world</h2>
<p>Потому что мы живем в безумном мире, и он станет еще безумнее, если мы позволим меньшинствам – будь то карлики, или гиганты, орангутаны или дельфины, ядерные психи или певцы чистой воды, компьютерные фанатики или неолуддиты, простаки или мудрецы – вмешиваться в эстетику.</p>

<h2>The sun</h2>
<p>Солнце горит каждый день. Оно сжигает Время. Планета несется по кругу и вертится вокруг собственной оси, а Время только и делает, что сжигает годы и в любом случае сжигает людей, не прибегая к его, Монтага, помощи. И если он вместе с другими пожарными будет сжигать разные вещи, а солнце будет сжигать Время, то это значит, что сгорит все!</p>

<p>Если тебе дали разлинованную бумагу, пиши по-своему.</p>
                </div>
              </div>
            </div>

            

            
          </section>
          <section class="content__right col-md-4">
            
                <?php include "../includes/sidebar.php" ?>
            
          </section>
        </div>
      </div>
    </div>

    <?php include "../includes/footer.php"?>

  </div>

</body>
</html>