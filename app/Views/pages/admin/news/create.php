<?= $this->extend('layout/admin_layout'); ?>

<?= $this->section('content'); ?>
<div class="card shadow">
    <h3 class="text-center fw-bold pt-4">Create News</h3>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <?= implode('<br>', session()->getFlashdata('errors')) ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('admin/news/store'); ?>" method="post" enctype="multipart/form-data" class="card-body">
        <?= csrf_field(); ?>
        <div class="form-group">
            <label for="title">News Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= old('title'); ?>" required>
        </div>

        <div class="form-group mt-2">
            <label for="title">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3"><?= old('description'); ?></textarea>
        </div>

        <div class="form-group mt-2">
            <label for="image">News Main Image</label>
            <input type="file" name="image" id="image" value="<?= old('image'); ?>" class="form-control">
        </div>

        <div class="form-group mt-2">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control" rows="10"><?= old('content'); ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Save News</button>
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
