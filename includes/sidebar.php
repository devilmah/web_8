<div class="block">
              <h3>Посещения</h3>
              <div class="block__content">
                <script type="text/javascript" src="//rf.revolvermaps.com/0/0/0.js?i=53syk67v2xa&amp;d=3&amp;p=0&amp;b=0&amp;w=293&amp;g=2&amp;f=arial&amp;fs=12&amp;r=0&amp;c0=000000&amp;c1=000000&amp;c2=000000&amp;ic0=0&amp;ic1=0" async="async"></script>
              </div>
            </div>

            <div class="block">
              <h3>Топ читаемых статей</h3>
              <div class="block__content">
                <div class="articles articles__vertical">

                  <?php
                      $articles = mysqli_query($connection,"SELECT * FROM `articles`  ORDER BY `views` DESC LIMIT 5");
                    ?>
                    <?php
                      while($art= mysqli_fetch_assoc($articles) )
                      {
                        ?>
                            <article class="article">
                               <div class="article__image" style="background-image: url(/static/images/<?php echo $art['image']; ?>);"></div>
                               <div class="article__info">
                                 <a href="/article.php?id=<?php echo $art['id']; ?>"><?php echo $art['title'];?></a>
                                 <div class="article__info__meta">
                                  <?php
                                    $art_cat=false;
                                    foreach($categories as $cat)
                                    {
                                      if( $cat['id']==$art['categorie_id'])
                                      {
                                        $art_cat=$cat;
                                        break;
                                      }
                                    }
                                  ?>
                                   <small>Категория: <a href="/articles.php?categorie=<?php echo $art_cat['id']?>"><?php echo $art_cat['title']?></a></small>
                                 </div>
                                 <div class="article__info__preview"><?php echo mb_substr($art['text'],0,50,'utf-8'); ?>...</div>
                               </div>
                             </article>
                        <?php
                      }
                    ?>

                </div>
              </div>
            </div>
                        <div class="block">
              <h3>Комментарии</h3>
              <div class="block__content">
                <div class="articles articles__vertical">

                                    <?php
                      $comments = mysqli_query($connection,"SELECT * FROM `comments`  ORDER BY `id` DESC LIMIT 5");
                    ?>
                    <?php
                      while($comment= mysqli_fetch_assoc($comments) )
                      {
                        ?>
                            <article class="article">
                              <?php
                               $photos = mysqli_query($connection,"SELECT img FROM `users` WHERE `name` ='".$comment['author']."'");
              $photo= mysqli_fetch_assoc($photos);?>
                               <div class="article__image" style="background-image: url(../uploads/<?php print $photo['img'] ?>");"></div>
                               <div class="article__info">
                                 <a href="/article.php?id=<?php echo $comment['articles_id']; ?>"><?php echo $comment['author'];?></a>

                                 <div class="article__info__preview"><?php echo mb_substr($comment['text'],0,50,'utf-8'); ?>...</div>
                               </div>
                             </article>
                        <?php
                      }
                    ?>


                </div>
              </div>
            </div>