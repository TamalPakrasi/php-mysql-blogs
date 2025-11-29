<section class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content bg-dark">
            <div class="modal-header text-white">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?php get_href("/profile/update"); ?>" class="row g-3 needs-validation text-white" novalidate>
                    <div class="col-md-6"> <label class="form-label">First Name</label> <input type="text" class="form-control" required>
                        <div class="invalid-feedback"> Please enter your first name. </div>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" required>
                        <div class="invalid-feedback">
                            Please enter your last name.
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label class="form-label">Profile Picture</label>
                        <input type="file" class="form-control" accept="image/*">
                    </div>

                    <input type="hidden" name="token" value="<?php echo htmlspecialchars($csrf_token); ?>">

                    <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>