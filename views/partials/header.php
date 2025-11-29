<header class="position-sticky top-0 start-0 container bg-black z-3">
    <nav class="navbar navbar-expand-md navbar-dark bg-black py-3 border-bottom border-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php get_href("/"); ?>">Blog App</a>

            <?php if (!isset($render_nav) || $render_nav === true) { ?>
                <div>
                    <?php if (isset($isAuthenticated) && $isAuthenticated === true) { ?>
                        <a
                            href="<?php get_href("/profile/me"); ?>"
                            class="d-inline-block text-decoration-none me-1 d-md-none">
                            <img
                                src="https://scontent.fccu27-2.fna.fbcdn.net/v/t39.30808-6/438164735_415148464719449_1495051908680627143_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=RXEtFZVWEpsQ7kNvwHaM2Zu&_nc_oc=AdntsSpzo_8Vp_Tb_-W2AtbsEV9CPVPLeXpp4zrak4FpSFsmJvgPjkSKVvF6TFF0ZdLsxaC8Y-JMjKrOkK_TfbS4&_nc_zt=23&_nc_ht=scontent.fccu27-2.fna&_nc_gid=kPItUjy-O-Wp2AJ88nSJGg&oh=00_Afgm_xj9Ovb150ToF6pUI2e5wBO0AtATVsf2-VqYXBHjZw&oe=6930ACEC"
                                alt="profile"
                                class="rounded-circle me-2"
                                width="40"
                                height="40">
                        </a>
                    <?php } else { ?>
                        <a href="<?php get_href("/get-started");
                                    ?>" type="button" class="btn me-1 btn-outline-success d-inline-block d-md-none">Get Started</a>

                    <?php } ?>

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

                <?php if (isset($isAuthenticated) && $isAuthenticated === true) { ?>
                    <a
                        href="<?php get_href("/profile/me"); ?>"
                        class="d-none d-md-inline text-decoration-none ms-1">
                        <img
                            src="https://scontent.fccu27-2.fna.fbcdn.net/v/t39.30808-6/438164735_415148464719449_1495051908680627143_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=RXEtFZVWEpsQ7kNvwHaM2Zu&_nc_oc=AdntsSpzo_8Vp_Tb_-W2AtbsEV9CPVPLeXpp4zrak4FpSFsmJvgPjkSKVvF6TFF0ZdLsxaC8Y-JMjKrOkK_TfbS4&_nc_zt=23&_nc_ht=scontent.fccu27-2.fna&_nc_gid=kPItUjy-O-Wp2AJ88nSJGg&oh=00_Afgm_xj9Ovb150ToF6pUI2e5wBO0AtATVsf2-VqYXBHjZw&oe=6930ACEC"
                            alt="profile"
                            class="rounded-circle me-2"
                            width="40"
                            height="40">
                    </a>
                <?php } else { ?>
                    <a href="<?php get_href("/get-started");
                                ?>" type="button" class="btn ms-1 btn-outline-success d-none d-md-inline">Get Started</a>

                <?php } ?>

            <?php } else { ?>
                <a href="<?php get_href("/blogs") ?>" class="bg-transparent border-0 text-white"><i class="fa-solid fa-arrow-right-from-bracket" style="rotate: 180deg;"></i></a>
            <?php } ?>
        </div>
    </nav>
</header>