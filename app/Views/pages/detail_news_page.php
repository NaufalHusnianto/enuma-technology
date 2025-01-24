<?= $this->extend('layout/main_layout'); ?>

<?php 
function parse_oembed_content($content) {
    return preg_replace_callback('/<oembed url="([^"]+)"><\/oembed>/', function ($matches) {
        $url = $matches[1];

        return '<iframe width="560" height="315" src="' . str_replace('youtu.be/', 'www.youtube.com/embed/', $url) . '" frameborder="0" allowfullscreen></iframe>';
    }, $content);
}
?>


<?php $this->section('content'); ?>
<div class="container py-4">
    <h1 class="card-title mb-4"><?= esc($news['title']); ?></h1>
    <p class="card-text text-muted mb-4"><?= esc($news['description']); ?></p>
    
    <!-- Gambar Berita -->
    <?php if ($news['image_url']): ?>
        <img src="<?= base_url('uploads/news/' . esc($news['image_url'])); ?>" alt="News Image" class="img-fluid mb-4">
        <?php endif; ?>
        
        <!-- Content Berita -->
    <div class="content text-dark styled-content">
        <?= parse_oembed_content($news['content']); ?>
    </div>


    <!-- Tanggal Berita -->
    <div class="text-muted mt-4">
        <span>Posted on: <?= date('d M Y', strtotime($news['created_at'])); ?></span>
    </div>
</div>
<?= $this->endSection(); ?>
