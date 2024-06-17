<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="/img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="/css/main.css">
    <title><?= $this->view_data['title'] ?></title>
</head>

<body>
    <header class="mx-5">
        <nav class="navbar bg-body-tertiary ps-4">
            <div class="container-fluid d-flex justify-content-between align-items-center">
                <div class="d-flex justify-content-start">
                    <ul class="navbar-nav d-flex flex-row fs-6 fw-medium text-secondary">
                        <li class="nav-item me-3 d-flex align-items-center">
                            <i class="bi bi-telephone-fill me-2"></i> +380630000000
                        </li>
                        <li class="nav-item d-flex align-items-center">
                            <i class="bi bi-envelope-fill me-2"></i> attorney_test@gmail.com
                        </li>
                    </ul>
                </div>
                <div class="additional-content d-flex justify-content-end">
                    <ul class="navbar-nav d-flex flex-row fs-6 fw-medium text-secondary">
                        <li class="nav-item me-1 d-flex align-items-center">
                            <i class="bi bi-facebook me-2 text-primary"></i></i>
                        </li>
                        <li class="nav-item me-1 d-flex align-items-center">
                            <i class="bi bi-whatsapp me-2 text-success"></i></i>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg bg-body-secondary ps-5s" data-layout=rd-navbar-fixed data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="53px" data-xl-stick-up-offset="53px" data-xxl-stick-up-offset="53px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true"">
                <div class=" container-fluid">
                <a class="navbar-brand" href=" ">
                    <img src="/img/logo.png" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    Aдвокатське об'єднання
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="">Головна</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Про нас</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Контакти</a>
                        </li>
                    </ul>
                </div>
        </div>
        </nav>
        </div>
    </header>

    <main>
        <?php include $view_path; ?>
    </main>
    <footer class="bg-secondary-subtle">
        <ul class="nav justify-content-center border-bottom">
        <li class="nav-item"> <a href=" " class="nav-link px-2 text-muted">Головна</a></li>
            <li class="nav-item"> <a href="/main/about" class="nav-link px-2 text-muted">Про нас</a></li>
            <li class="nav-item"> <a href="/main/contacts" class="nav-link px-2 text-muted">Контакти</a></li>
            <!-- <li class="nav-item"> <a href="/shop" class="nav-link px-2 text-muted">Крамниця</a></li> -->
        </ul>
        <p class="text-center text-muted">&copy;2024 Македонська І.О.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>