<section class="d-flex justify-content-center ui-widget" role="search">
    <input class="form-control" id="search-blogs" style="max-width: 500px;" type="search" placeholder="Search Blogs..." aria-label="Search">
</section>

<section style="margin-top: 8rem;">
    <h2 class="text-center">Latest Blogs</h2>

    <div class="row mt-5 row-gap-5">
        <?php require_file("components/gridCard"); ?>
        <?php require_file("components/gridCard"); ?>
        <?php require_file("components/gridCard"); ?>
        <?php require_file("components/gridCard"); ?>
        <?php require_file("components/gridCard"); ?>
    </div>
</section>

<section class="mt-5 d-flex justify-content-center">
    <nav>
        <ul class="pagination bg-black p-2 rounded-3">
            <li class="page-item">
                <a class="page-link bg-black text-white border-secondary" href="#">«</a>
            </li>
            <li class="page-item active">
                <a class="page-link bg-white text-black border-white" href="#">1</a>
            </li>
            <li class="page-item">
                <a class="page-link bg-black text-white border-secondary" href="#">2</a>
            </li>
            <li class="page-item">
                <a class="page-link bg-black text-white border-secondary" href="#">3</a>
            </li>
            <li class="page-item">
                <a class="page-link bg-black text-white border-secondary" href="#">»</a>
            </li>
        </ul>
    </nav>
</section>