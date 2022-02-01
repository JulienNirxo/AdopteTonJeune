<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Adopte Ton Jeune</title>
        <link rel="icon" type="image/x-icon" href="View/assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="View/css/inscription.css" rel="stylesheet" />
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="View/js/inscription.js"></script>
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
                        <li class="nav-item"><a class="btn btn-primary" href="/">Accueil</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead background-img">
            <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="label-white">Email</label>
                                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="label-white">Mot de passe</label>
                                <input type="password" class="form-control" name="mdp" id="mdp" placeholder="Mot de passe">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1" class="label-white">Saisir le mot de passe à nouveau</label>
                                <input type="password" class="form-control" name="mdp2" id="mdp2" placeholder="Mot de passe">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="label-white">Nom</label>
                                <input type="text" class="form-control" name="nom" id="nom" aria-describedby="emailHelp" placeholder="Nom">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="label-white">Prenom</label>
                                <input type="text" class="form-control" name="prenom" id="prenom" aria-describedby="emailHelp" placeholder="Prenom">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="label-white">Age</label>
                                <input type="text" class="form-control" name="age" id="age" aria-describedby="emailHelp" placeholder="Age">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="label-white">Ville</label>
                                <input type="text" class="form-control" name="ville" id="ville" aria-describedby="emailHelp" placeholder="Ville">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="label-white">Adresse</label>
                                <input type="text" class="form-control" name="adresse" id="adresse" aria-describedby="emailHelp" placeholder="Adresse">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" class="label-white">Code postale</label>
                                <input type="text" class="form-control" name="cp" id="cp" aria-describedby="emailHelp" placeholder="Code postale">
                            </div><br>
                            <p class="label-white">Vous êtes :</p>

                            <div>
                                <input type="radio" id="vieux" name="type" value="vieux" checked>
                                <label class="label-white" for="huey">Un vieux</label>
                                <input type="radio" id="jeune" name="type" value="jeune">
                                <label class="label-white" for="dewey">Un jeune</label>
                            </div>




                            <br>
                            <button class="btn btn-primary" id="btnInscription"">Inscription</button>

                    </div>
                </div>
            </div>
        </header>
        <!-- Footer-->
        <footer class="footer bg-black small text-center text-white-50"><div class="container px-4 px-lg-5">Copyright &copy; AdopteTonJeune.fr 2021</div></footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="View/js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
