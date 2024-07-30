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

        <link rel="stylesheet" href="../css/highlight.css" />

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

                    <li class="nav-item">
                        <?= $admButtom ?>
                    </li>
                </ul>
        </div>
    </nav>

    <div class="container">
        <br>

        <div class="card">
            <div class="card-header">
                <h5 class="card-title"><?= $exercise['name'] ?></h5>
            </div>
            <div class="card-body">
                <p class="card-text"><?= $exercise['description'] ?></p>
                <br>
                <form action="submit.php?testbench_id=<?= $exercise['id'] ?>" method="post">
                    <input type="hidden" name="id" value="<?= $exercise['id'] ?>">
                    <div class="mb-3">
                        <label for="code" class="form-label">Código:</label>
                        <div class="highlight-container">
                            <pre class="highlight"></pre>
                            <textarea class="form-control textarea" id="code" name="code" rows="40"><?= $code ?></textarea>
                        </div>
                    </div>
                    <!-- justify end -->
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn">Enviar</button>
                    </div>
            </div>

    </div>

    <br>
    <br>

    <footer class="stripes2">
        <div class="stripe1"></div>
        <div class="stripe2"></div>
        <div class="stripe3"></div>
        <div class="stripe4"></div>
        <div class="stripe5"></div>
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

        <script src="../js/tabFunc.js"></script>
        <script src="../js/highlight.js"></script>

    </body>
</html>
