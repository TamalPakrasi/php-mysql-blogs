<!DOCTYPE html>
<html lang="en" data-base="<?php echo BASE_URL ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($title) ? "Blog App - " . htmlspecialchars($title) : "DOCUMENT" ?></title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
    <div id="root" class="bg-black min-vh-100 d-flex flex-column position-relative">
        <?php
        if (!isset($render_partials) || $render_partials === true)
            require_once require_file("partials/header");
        ?>

        <main class="flex-grow-1 pb-5 container text-white d-flex flex-column" style="margin-top: 6rem;">
            <?php echo $content; ?>
        </main>

        <?php if (isset($_SESSION["message"])) : ?>
            <section id="alert-sec" class="position-fixed w-100" style="top: 85px; z-index: 500">
                <div class="alert alert-success mx-auto alert-dismissible fade show" style="width: fit-content;" role="alert">
                    <?php
                    echo $_SESSION["message"];
                    unset($_SESSION["message"]);
                    ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </section>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <script src="<?php get_href("/public/js/alert.js"); ?>"></script>

    <?php if (isset($scripts)) : ?>
        <?php foreach ($scripts as $script) : ?>
            <script src="<?php get_href("/public/js/" . $script . ".js"); ?>"></script>
        <?php endforeach; ?>
    <?php endif; ?>
</body>

</html>