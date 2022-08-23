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
            <h3>Изменение профиля</h3>
              <div class="block__content">
                <form enctype="multipart/form-data" class = "form" action="change.php" method="POST">
                
                  <div class="form__group">
                    <textarea name="text"  class="form-control mb-4" >Описание</textarea>
                      </div>
                      <div class="form__group">
                    <input type="hidden" name="MAX_FILE_SIZE"  value="30000" /><input name="image" class="form-control btn btn-dark " type="file" />
                  </div>
                  <div class="form__group">
                  <input type="submit" class="form-control btn btn-dark " value="Отправить файл" />
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
if (!move_uploaded_file($image["tmp_name"], "./uploads/" . $fileName)) {
    die('Error upload file');
}
  $res = mysqli_query($connection,"UPDATE `users` SET img ='".$fileName."', descr ='".$_POST['text']."'  WHERE login = '".$_SESSION['login']."'") or die();
  echo("Профиль обновлен.");
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