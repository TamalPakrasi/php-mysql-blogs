<section class="d-flex flex-column justify-center-center align-items-center">
    <h2 class="fw-bold">Create New Blog</h2>

    <form action="<?php get_href("/blogs/create") ?>" class="row g-3 needs-validation mt-5" style="max-width: 600px;" novalidate>
        <div class="col-md-6"> <label class="form-label">Title</label> <input type="text" class="form-control" required>
            <div class="invalid-feedback"> Please enter blog title. </div>
        </div>

        <div class="col-md-6">
            <label class="form-label">Description (optional)</label>
            <input type="text" class="form-control">
        </div>

        <div class="col-md-12">
            <label class="form-label">Thumbnail (optional)</label>
            <input type="file" class="form-control" accept="image/*">
        </div>

        <input type="hidden" name="token" value="<?php echo htmlspecialchars($csrf_token); ?>">

        <div class="col-12">
            <button class="btn btn-primary w-100" type="submit">Create</button>
        </div>
    </form>
</section>