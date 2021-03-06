<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Adopte Ton Jeune</title>
        <link rel="icon" type="image/x-icon" href="View/assets/favicon.ico" />
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link href="View/css/recherchejeune.css" rel="stylesheet" />
        <script src="View/js/recherchejeune.js"></script>
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light " id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="/"><img class="size-logo" src="View/assets/img/logo.png">Adopte Ton Jeune</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <?php if(isset($_SESSION['idJeune'])){ ?>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="btn btn-primary" href="homejeune.php">Mon Compte</a></li>
                            <li class="nav-item"><a class="btn btn-primary" href="sessiondestroy.php">D??connexion</a></li>
                        </ul>
                    <?php } else if(isset($_SESSION['idVieux'])){ ?>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="btn btn-primary" href="homevieux.php">Mes demandes</a></li>
                            <li class="nav-item"><a class="btn btn-primary" href="sessiondestroy.php">D??connexion</a></li>
                        </ul>
                    <?php }else{ ?>
                        <ul class="navbar-nav ms-auto">
                            <li class="nav-item"><a class="btn btn-primary" href="inscription.php">Inscription</a></li>
                            <li class="nav-item"><a class="btn btn-primary" href="connexion.php">Connexion</a></li>
                        </ul>
                    <?php } ?>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <br><br>
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <div class="card">
                            <div class="card-body">
                                <h4>Votre recherche :</h4>

                                <?php
                                for($i = 0; $i < count($data); $i++) {
                                    $var = 7;?>
                                <div class="card" style="background-color:lightgrey;">
                                    <p><?= $data[$i]['NOM']." ".$data[$i]['PRENOM'].", ".$data[$i]['AGE']."ans, cherche autour de ". $data[$i]['name'].", ".$data[$i]['ADRESSE']; ?></p>
                                    <div class='text-left'>
                                    <p>Comp??tences :</p>
                                    <?php
                                    for($ii = 15; $ii <= ceil(count($data[$i])); $ii++){
                                        echo "- ".$data[$i][$var][0]."<br>";
                                        $var++;
                                    }
                                     ?>
                                    </div>
                                    <button class="btn btn-primary" onclick="sendContrat(<?= $data[$i]['ID'] ?>);">Demander le jeune</button>
                                </div>
                                    <br>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </header>
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">Copyright &copy; AdopteTonJeune.fr 2021</div></footer>
        
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
    </body>
</html>
