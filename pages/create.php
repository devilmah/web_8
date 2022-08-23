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
        <div class="block" id="comment-add-form">
            <h3>Создание статьи</h3>
              <div class="block__content">
                <form enctype="multipart/form-data" class = "form" action="create.php" method="POST">
                <div class="form__group">
                    <input name="article_name"  class="form-control mb-4" placeholder="Название статьи">
                      </div>
                      <div class="form__group">
                      <label for="options" class="form-label">Категории</label>
                        <select name="options" class="form-select" multiple aria-label="Default select example" >
  					        <option name="select1" value = "1" selected>Музыка</option>
  					        <option name="select2" value="2">Кино</option>
  					        <option name="select3" value="3">Искусство</option>
  					        <option name="select4" value="4">Фото</option>
                        </select>
                      </div>
                  <div class="form__group">
                    <label for="options" class="form-label">Текст статьи</label>
                    <textarea name="article_text"  class="form-control mb-4" >Текст</textarea>
                      </div>
                      <div class="form__group">
                    <input type="hidden" name="MAX_FILE_SIZE"  value="30000" /><input name="image" class="form-control btn btn-dark " type="file" />
                  </div>
                  <div class="form__group">
                  <input type="submit" class="form-control btn btn-dark " value="Создать" />
                      </div>

                </form>
              </div>
      </div>

<?php
}

else {

// получаем информацию о файале из ключа image
$image = $_FILES["image"];

// валидация

// типы файлов, которые можно загружать

// создаем папку uploads в корне проекта, если её нет
if (!is_dir('./uploads')) {
    mkdir('./uploads', 0777, true);
}

// изнаем расширение текущего файла
$extension = pathinfo($image["name"], PATHINFO_EXTENSION);
// формируем уникальное имя с помощью функции time()
$fileName = time() . ".$extension";

// загружаем файл и проверяем
// если во премя загрузки файла произошла ошибка, возвращаем die()
if (!move_uploaded_file($image["tmp_name"], "./static/images/" . $fileName)) {
    die('Error upload file');
}
  $res = mysqli_query($connection,"INSERT INTO `articles`(`author`,`title`,`image`,`text`,`categorie_id`,`pubdate`,`views`) VALUES('".$_SESSION['login']."','".$_POST['article_name']."','".$fileName."','".$_POST['article_text']."',".$_POST['options'].",NOW(),0)");
  echo("Статья создана");
}
?>
              
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