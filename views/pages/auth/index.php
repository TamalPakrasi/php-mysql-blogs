<section class="d-flex flex-column justify-center-center align-items-center">
    <h2 class="fw-bold">Get Started</h2>

    <div class="mt-5">
        <button class="btn btn-primary auth" role="button" data-role="register">Register</button>
        <button class="btn btn-outline-light ms-2 auth" role="button" data-role="login">Log In</button>
    </div>

    <form action="<?php get_href("/auth/register") ?>" class="row g-3 needs-validation mt-5 register-form" style="max-width: 600px;" novalidate>
        <h4 class="text-center mb-3">Register Account</h4>

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


        <div class="col-md-6">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" required>
            <div class="invalid-feedback">
                Please enter a valid email address.
            </div>
        </div>


        <div class="col-md-6 position-relative">
            <label class="form-label">Password</label>
            <input type="password" class="form-control" minlength="8" required>
            <i class="fa-solid fa-eye position-absolute text-black togglePassword" style="top: 42px; right: 35px; cursor: pointer;"></i>
            <div class="invalid-feedback">
                Password must be at least 8 characters.
            </div>
        </div>

        <div class="col-md-12">
            <label class="form-label">Profile Picture</label>
            <input type="file" class="form-control" accept="image/*" required>
            <div class="invalid-feedback">
                Please upload your profile picture.
            </div>
        </div>

        <input type="hidden" name="token" value="<?php echo htmlspecialchars($csrf_token); ?>">

        <div class="col-12">
            <button class="btn btn-primary w-100" type="submit">Register</button>
        </div>

    </form>

    <form action="<?php get_href("/auth/login") ?>" class="row g-3 needs-validation mt-5 login-form d-none" style="max-width: 600px;" novalidate>
        <h4 class="text-center mb-3">Log into your account</h4>

        <div class="col-md-6">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" required>
            <div class="invalid-feedback">
                Please enter a valid email address.
            </div>
        </div>


        <div class="col-md-6 position-relative">
            <label class="form-label">Password</label>
            <input type="password" class="form-control">
            <i class="fa-solid fa-eye position-absolute text-black togglePassword" style="top: 42px; right: 35px; cursor: pointer;"></i>
        </div>

        <input type="hidden" name="token" value="<?php echo htmlspecialchars($csrf_token); ?>">

        <div class="col-12">
            <button class="btn btn-primary w-100" type="submit">Log In</button>
        </div>
    </form>
</section>