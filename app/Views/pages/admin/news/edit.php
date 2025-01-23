<?= $this->extend('layout/admin_layout'); ?>

<?= $this->section('content'); ?>
<div class="card shadow">
    <h3 class="text-center fw-bold pt-4">Edit News</h3>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <?= implode('<br>', session()->getFlashdata('errors')) ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('admin/news/update/' . $news['id']); ?>" method="post" enctype="multipart/form-data" class="card-body px-4">
        <?= csrf_field(); ?>
        <div class="form-group">
            <label for="title">News Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= old('title', $news['title']); ?>" required>
        </div>

        <div class="form-group mt-2">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3"><?= old('description', $news['description']); ?></textarea>
        </div>

        <!-- Current Image -->
        <?php if ($news['image_url']): ?>
            <div class="form-group mt-2">
                <label>Current Image</label>
                <div class="mb-2">
                    <img src="<?= base_url('uploads/news/' . esc($news['image_url'])); ?>" alt="News Image" class="img-fluid" style="max-height: 200px;">
                </div>
                <div class="form-text">Leave the image field empty if you don't want to replace it.</div>
            </div>
        <?php endif; ?>

        <div class="form-group mt-2">
            <label for="image">Upload New Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>

        <div class="form-group mt-2">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control" rows="10"><?= old('content', $news['content']); ?></textarea>
        </div>

        <button type="submit" class="btn btn-success mt-3">Update News</button>
        <a href="<?= base_url('admin/news'); ?>" class="btn btn-secondary mt-3">Cancel</a>
    </form>
</div>

<script>
    ClassicEditor
        .create(document.querySelector('#content'), {
            ckfinder: {
                uploadUrl: '<?= base_url('upload/image') ?>'
            }
        })
        .catch(error => {
            console.error(error);
        });
</script>
<?= $this->endSection(); ?>
