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
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page">|</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php" aria-current="page">Sair Para Dashboard</a>
                    </li>
                </ul>
        </div>
    </nav>

    <div class="container">
        <form action="createEx.php?id=<?= $id ?>" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $name ?>">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrição</label>
                <textarea class="form-control" id="description" name="description" rows="20"><?= $des ?></textarea>
            </div>
            <div class="mb-3">
                <label for="test" class="form-label">Tests</label>
                <textarea class="form-control" id="test" name="test" rows="20"><?= $tests ?></textarea>
            </div>
            <div class="mb-3">
                <label for="code" class="form-label">Code</label>
                <textarea class="form-control" id="code" name="code" rows="20"><?= $code ?></textarea>
            </div>
            <div class="mb-3">
                <label for="difficulty" class="form-label">Dificuldade</label>
                <select class="form-select" id="difficulty" name="difficulty" value="<?= $diff ?>">
                    <option value="1">Fácil</option>
                    <option value="2">Médio</option>
                    <option value="3">Difícil</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
    </div>

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
