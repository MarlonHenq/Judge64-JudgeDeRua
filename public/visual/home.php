<!doctype html>
<html lang="pt-br">
    <head>
        <title>Judge64 - MarlonHenq.dev</title>
        <!-- Required meta tags -->
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
            <button
                class="navbar-toggler d-lg-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId"
                aria-controls="collapsibleNavId"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon">

                </span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" aria-current="page"
                            >Home
                            <span class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="create.php">Criar Conta</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    

    <!-- <nav class="bg-dark py-2 mb-3 border-bottom border-secondary text-center">
        <a href="#" class="btn btn-secondary border rounded-0 me-2">Home</a>
        <a href="create.php" class="btn btn-secondary border rounded-0 me-2">Criar Conta</a>
        <a href="https://marlonhenq.dev/#contato" class="btn btn-secondary border rounded-0">Contato</a>
    </nav> -->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card border-secondary bg-dark text-light shadow-sm rounded-0">
                    <div class="card-body">
                        <h2 class="card-title text-success mb-4">Login</h2>
                        <form action="index.php" method="post">
                            <div class="mb-3">
                                <label for="nick" class="form-label">Nome de Usuário:</label>
                                <input type="text" id="nick" name="nick" class="form-control bg-light text-dark" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Senha:</label>
                                <input type="password" id="password" name="password" class="form-control bg-light text-dark" required>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="stripes">
        <div class="stripe1"></div>
        <div class="stripe2"></div>
        <div class="stripe3"></div>
        <div class="stripe4"></div>
        <div class="stripe5"></div>
    </div>

    <footer class="bg-dark text-light text-center py-2 border-top border-secondary mt-3">
        &copy; 2024 Judge64 - Se pá alguns direitos reservados.
        | With <3 by <a href="https://marlonhenq.dev">@MarlonHenq</a>
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
