<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Öğrenci Kayıt Ekranı</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootsrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <!-- Bootsrap Script -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="css/style.css">

    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
                <a class="navbar-brand" href="index.php">Öğrenci</a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link" href="index.php">Listele</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="record.php">Yeni Kayıt</a>
                    </li>
                </ul>
            </nav>
        </header>

        <main role="main">
            <div class="jumbotron">
                <div class="container">
                    <h1 class="display-4">Öğrenci Kayıt Ekranı</h1>      
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">

                    <form action="/partial/add_data.php" enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label >Adı:</label>
                            <input type="text" class="form-control" placeholder="Adını Giriniz" name="name" id="ad" required>
                        </div>
                        <div class="form-group">
                            <label>Soyadı:</label>
                            <input type="text" class="form-control" placeholder="Soyadını Giriniz" name="surname" id="surname" required>
                        </div>
                        <div class="form-group">
                            <label>Cinsiyeti:</label>
                            <select id="inputState" name="gender" class="form-control">
                                <option value="0">Kadın</option>
                                <option value="1">Erkek</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Sınıf:</label>
                            <select id="inputState" name="classId" class="form-control">
                                <?php 
                                        include 'partial\class_list.php';
                                    ?>
                                <!-- <option value="1"  selected>Amp 11V</option>
                                <option value="2">Amp 11Y</option> -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Resmi:</label>
                            <input type="file" class="form-control-file border" name="fileToUpload"  required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Kaydet</button>
                        </form>
                    </div>
                </div>
                <hr>
            </div>

        </main>
        <footer class="container">
            <p>© Company 2017-2018</p>    
        </footer>
    </body>
</html>