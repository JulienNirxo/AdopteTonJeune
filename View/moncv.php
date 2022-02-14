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
        <link href="View/css/styles.css" rel="stylesheet" />
        <script src="View/js/moncv.js"></script>
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="/"><img class="size-logo" src="View/assets/img/logo.png">Adopte Ton Jeune</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="btn btn-primary" href="index.php">Accueil</a></li>
                        <li class="nav-item"><a class="btn btn-primary" href="homejeune.php">Mon Compte</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <h1>Mon CV</h1>
                            <div class="card">
                                <div class="card-body">
                                    <input type="text" class="form-control" id="Mail" name="Mail" placeholder="Mail" value="<?= $data['MAIL'] ?>">
                                    <input type="text" class="form-control" id="Nom" name="Nom" placeholder="Nom" value="<?= $data['NOM'] ?>">
                                    <input type="text" class="form-control" id="Prenom" name="Prenom" placeholder="Prenom" value="<?= $data['PRENOM'] ?>">
                                    <input type="text" class="form-control" id="Age" name="Age" placeholder="Age" value="<?= $data['AGE'] ?>">
                                    <input type="text" class="form-control" id="Adresse" name="Adresse" placeholder="Adresse" value="<?= $data['ADRESSE'] ?>">
                                    <select id="departement-select" class="form-select" onchange="SelectVille();">
                                        <option value="<?= $data['department_code'] ?>"><?= $data['departementnom'] ?> (actuellement)</option>
                                    </select>
                                    <select id="ville-select" class="form-select">
                                        <option value="<?= $data['name'] ?>"><?= $data['name'] ?> (actuellement)</option>
                                    </select>
                                    <div class="text-left">
                                        <input type="checkbox" id="Cuisine" name="competence" value="1"><label for="scales">Cuisine</label><br>
                                        <input type="checkbox" id="Menage" name="competence" value="2"><label for="scales">Ménage</label><br>
                                        <input type="checkbox" id="Animaux" name="competence" value="5"><label for="scales">Animaux</label><br>
                                        <input type="checkbox" id="Jardinage" name="competence" value="7"><label for="scales">Jardinage</label><br>
                                        <input type="checkbox" id="Courses" name="competence" value="8"><label for="scales">Courses</label><br>
                                        <input type="checkbox" id="Jeuxdesociete" name="competence" value="9"><label for="scales">Jeux de sociétés</label><br>
                                        <input type="checkbox" id="Bricolage" name="competence" value="10"><label for="scales">Bricolage</label><br>
                                        <input type="checkbox" id="Livraisonderepas" name="competence" value="11"><label for="scales">Livraison de repas</label><br>
                                        <input type="checkbox" id="Accompagnementvehicule" name="competence" value="12"><label for="scales">Accompagnement véhiculé</label>
                                    </div>

                                    <button class="btn btn-primary" onclick="sendModif();">Enregistrer</button>
                                </div>
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
