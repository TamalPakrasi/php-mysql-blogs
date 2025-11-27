<header class="position-sticky top-0 start-0 container bg-black">
    <nav class="navbar navbar-expand-md navbar-dark bg-black py-3 border-bottom border-light-subtle">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php get_href("/"); ?>">Blog App</a>

            <div>
                <a href="<?php get_href("/get-started") ?>" type="button" class="btn me-1 btn-outline-success d-inline-block d-md-none">Get Started</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php isActive("/"); ?>" href="<?php get_href("/"); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php isActive("/blogs"); ?>" href="<?php get_href("/blogs"); ?>">Blogs</a>
                    </li>
                </ul>
            </div>

            <a href="<?php get_href("/get-started"); ?>" type="button" class="btn ms-1 btn-outline-success d-none d-md-inline">Get Started</a>
        </div>
    </nav>
</header>