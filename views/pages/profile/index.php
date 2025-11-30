<section class="row justify-content-center">
    <div class="col-md-6">
        <div class="card text-center p-4 shadow-sm border-0 bg-transparent">
            <img
                src="https://scontent.fccu27-2.fna.fbcdn.net/v/t39.30808-6/438164735_415148464719449_1495051908680627143_n.jpg?_nc_cat=111&ccb=1-7&_nc_sid=6ee11a&_nc_ohc=RXEtFZVWEpsQ7kNvwHaM2Zu&_nc_oc=AdntsSpzo_8Vp_Tb_-W2AtbsEV9CPVPLeXpp4zrak4FpSFsmJvgPjkSKVvF6TFF0ZdLsxaC8Y-JMjKrOkK_TfbS4&_nc_zt=23&_nc_ht=scontent.fccu27-2.fna&_nc_gid=kPItUjy-O-Wp2AJ88nSJGg&oh=00_Afgm_xj9Ovb150ToF6pUI2e5wBO0AtATVsf2-VqYXBHjZw&oe=6930ACEC"
                class="rounded-circle mx-auto mb-3"
                width="120"
                height="120"
                alt="Profile Pic" />

            <h3 class="fw-bold mb-1 text-white">John Doe</h3>
            <p class="mb-3 text-secondary">Joined: January 2024</p>

            <div class="row text-center mb-4">
                <div class="col">
                    <h5 class="fw-bold mb-0 text-white">42</h5>
                    <small class="text-secondary">Blogs</small>
                </div>
                <div class="col">
                    <h5 class="fw-bold mb-0 text-white">12,890</h5>
                    <small class="text-secondary">Views</small>
                </div>
            </div>

            <?php if (isset($page) && $page === "me") : ?>
                <button type="button" class="btn btn-primary px-4" id="edit" data-bs-toggle="modal" data-bs-target="#modal">
                    <i class="fa-solid fa-pencil"></i> Edit Profile
                </button>


                <form id="logout" class="mt-3">
                    <input type="hidden" name="token" value="<?php echo htmlspecialchars($csrf_token); ?>">
                    <button type="submit" class="btn btn-primary px-4 w-100" id="logout-btn">
                        Log out
                    </button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php require_once require_file("components/blogSection"); ?>

<?php
if (isset($page) && $page === "me") {
    require_once require_file("components/createButton");

    require_once require_file("components/modal");
}
?>