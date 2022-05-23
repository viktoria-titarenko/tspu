<!DOCTYPE html>	
<html>
  <head> 
  <link href="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/vue@2.x/dist/vue.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/vuetify@2.x/dist/vuetify.min.js"></script>
  <meta charset="utf-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/portfolionew/css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
  <title>Портфолио</title>
</head>
<body>
<nav class="no-print navbar navabr-expand-lg navbar-dark bg-dark mb-4">
    <div class="container container-fluid">
    <div style="display: flex; align-items: baseline">
    <a class = "navbr" href="/portfolionew/authorization">
        <img src="https://local.tspu.edu.ru/portal/img/logoH39.png" class = 
    "image">
     Портфолио 
    </a>
    
    </div>
    <div  class="elem" >
    <div style="display: flex; flex-direction: row;" >
             <a class="nav-link active elem" arria-current="page" href="/portfolionew/semestr">Загрузить файлы</a>
            <a class="nav-link active elem" arria-current="page" href="/portfolionew/progress">Успеваемость</a>
      
           
         <?php if ($_SERVER['REQUEST_URI'] == "/portfolionew/profileteacher") {?>
            <a class="nav-link active elem" arria-current="page" href="/portfolionew/teacherLessons ">Просмотреть файлы</a><?php
        };
        ?>
        <a class="nav-link active elem" arria-current="page" href="/portfolionew/support ">Поддержка</a>
   
</div>
</nav>
        <div class="_container">
            <?php include 'application/views/'.$content_view; ?>
        </div>
</body>
</html>