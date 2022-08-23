<?php
require "includes/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?php echo $config['title']; ?></title>

  <!-- Bootstrap Grid -->
  <link rel="stylesheet" type="text/css" href="/media/assets/bootstrap-grid-only/css/grid12.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

  <!-- Custom -->
  <link rel="stylesheet" type="text/css" href="/media/css/style.css">
</head>
<body>

  <div id="wrapper">

    <?php include "includes/header.php"?>

    <?php 
    $article = mysqli_query($connection,"SELECT * FROM `articles` WHERE `id` =".(int)$_GET['id']);
    if(mysqli_num_rows($article)<=0)
    {
        ?>
                <div id="content">
                      <div class="container">
                        <div class="row">
                          <section class="content__left col-md-8">
                            <div class="block">

                              <h3>Статья не найдена</h3>
                              <div class="block__content">

                                <div class="full-text">

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
        <?php
    }else{
        $art= mysqli_fetch_assoc($article);
        mysqli_query($connection,"UPDATE `articles` SET `views`=`views`+ 1 WHERE `id` = ".(int) $_GET['id']);
        ?>
            <div id="content">
                      <div class="container">
                        <div class="row">
                          <section class="content__left col-md-8">
                            <div class="block">
                                <a><?php echo $art['views'];?> просмотров</a>
                              <h3><?php echo $art['title'];?></h3>
                              <div class="block__content">
                                    <img src="/static/images/<?php echo $art['image'];?>" style = "max-width:100%;" >
                                <div class="full-text">
                                    <?php echo $art['text'];?>
                                </div>
                                <div class="full-text">
                                  <h3>Автор</h3>
                                  <?php
                                  $art_authors = mysqli_query($connection,"SELECT * FROM `users` WHERE `login` = '".$art['author']."'" );
                                  $art_author = mysqli_fetch_assoc($art_authors);
                        ?>
                                <div class="article__image" style="display:inline-block; width: 125px;height: 125px;background-repeat: no-repeat;background-size: cover;background-position: center center;background-image: url(../uploads/<?php print $art_author['img'] ?>);"></div>
                               <div class="article__info" style=" float:right;width: 50%;">
                                 <p><?php echo $art_author['name'];?></p>

                                 <div class="article__info__preview"><?php echo $art_author['descr']; ?></div>
                                </div>
                              </div>
                            </div>

                          </section>
                          <section class="content__right col-md-4">

                                <?php include "includes/sidebar.php"; ?>

                          </section>
                        </div>
                      </div>
                    </div>
        <?php
    }
    ?>
                <div class="block">
                    <a href="#comment-add-form">Добавить свой</a>
              <h3>Комментарии</h3>
              <div class="block__content">
                <div class="articles articles__vertical">

                                    <?php
                      $comments = mysqli_query($connection,"SELECT * FROM `comments` WHERE `articles_id` = ".(int) $_GET['id'] ." ORDER BY `id` DESC");
                    ?>
                    <?php
                      while($comment= mysqli_fetch_assoc($comments) )
                      {
                        $authors = mysqli_query($connection,"SELECT * FROM `users` WHERE `login` = '".$comment['author']."'" );
                        $author = mysqli_fetch_assoc($authors);
                                ?>
                            <article class="article">
                               <div class="article__image" style="background-image: url(../uploads/<?php print $author['img'] ?>");"></div>
                               <div class="article__info">
                                 <a href="/article.php?id=<?php echo $comment['articles_id']; ?>"><?php echo $author['name'];?></a>

                                 <div class="article__info__preview"><?php echo $comment['text']; ?></div>
                               </div>
                             </article>
                        <?php
                      }
                    ?>


                </div>
              </div>
            </div>
<div class="block" id="comment-add-form">
              <?php
          if (!empty($_SESSION['login'])) {
              ?><h2><?php print $_SESSION['name']?></h2>
              <div class="block__content">
               
                <form class="form" method="POST" >
                <?php if( isset($_POST['do_post'])) //action="/article.php?id=<?php  echo $art['id']; ? >#comment-add-form"
                {
                    
                    
                    if( $_POST['text']=='')
                    {
                        $errors[]='Нельзя опубликовать пустой комментарий';
                    }
                    
                    if(empty($errors))
                    {
                      $article1 = mysqli_query($connection,"SELECT * FROM `articles` WHERE `id` =".(int)$_GET['id']);
                      $art1= mysqli_fetch_assoc($article1);
                      mysqli_query($connection,"INSERT INTO `comments` (`author`,`text`,`pubdate`,`articles_id`) VALUES ('".$_SESSION['login']."','".$_POST['text']."',NOW(),'".$art1['id']."')");
                        echo '<span>Комментарий добавлен</span>';
                    }else
                    {
                        echo $errors['0'];
                    }
                    
                }?>
                  
                  <div class="form__group">
                    <textarea name="text"  class="form__control" >Текст комментария</textarea>
                  </div>
                  <div class="form__group">
                    <input type="submit" class="form__control" name="do_post" value="Добавить комментарий">
                  </div>
                </form> 
                
              </div><?php } ?>
            </div>
    <?php include "includes/footer.php";?>

  </div>

</body>
</html>