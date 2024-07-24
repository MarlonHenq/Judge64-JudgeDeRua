<!doctype html>
<html lang="pt-br">
    <head>
        <title>Judge64 - Dashboard</title>
        <!-- RequFazered meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- icon -->
        <link
            rel="icon"
            type="image/png"
            href="../img/logo.png"
        />

        <!--metadata-->
        <meta
            name="description"
            content="A simple judge for programming exercises"
            author="@MarlonHenq"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />

        <link rel="stylesheet" href="../css/style.css" />
    </head>

    <body>
    <nav
        class="navbar navbar-expand-sm navbar-light bg-light"
    >
        <div class="container">
        <a class="navbar-brand" href="#">
            <img src="img/logo.png" width="35" height="35" alt="">
        </a>
            <a class="navbar-brand" href="">Judge64</a>
                <ul class="justify-content-end navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="exit.php" aria-current="page">Sair</a>
                    </li>
                </ul>
        </div>
    </nav>

    <div class="container">
        <br>
        <!-- <?= $content ?> -->

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Título do Card 1</h5>
                        <p class="card-text">Descrição do Card 1.</p>
                        <a href="#" class="btn">Fazer</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Título do Card 2</h5>
                        <p class="card-text">Descrição do Card 2.</p>
                        <a href="#" class="btn">Fazer</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Título do Card 3</h5>
                        <p class="card-text">Descrição do Card 3.</p>
                        <a href="#" class="btn">Fazer</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Título do Card 4</h5>
                        <p class="card-text">Descrição do Card 4.</p>
                        <a href="#" class="btn">Fazer</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Título do Card 5</h5>
                        <p class="card-text">Descrição do Card 5.</p>
                        <a href="#" class="btn">Fazer</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Título do Card 6</h5>
                        <p class="card-text">Descrição do Card 6.</p>
                        <a href="#" class="btn">Fazer</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Título do Card 7</h5>
                        <p class="card-text">Descrição do Card 7.</p>
                        <a href="#" class="btn">Fazer</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Título do Card 8</h5>
                        <p class="card-text">Descrição do Card 8.</p>
                        <a href="#" class="btn">Fazer</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Título do Card 9</h5>
                        <p class="card-text">Descrição do Card 9.</p>
                        <a href="#" class="btn">Fazer</a>
                    </div>
                </div>
            </div>
        </div>

    </div>

        <footer class="footer bg-light">
            <div class="container">
                <p style="color: black;">Olá <b><?= $user['nickname'] ?></b>, você tem <b><?= $completed ?></b> exercícios completados.</p>
            </div>
        </footer>

        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
