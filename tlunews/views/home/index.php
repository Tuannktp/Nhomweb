<?php include '../header.php'; ?>

<div class="row">
    <div class="col-md-8">
        <h2 class="mb-4">Tin Tức Mới Nhất</h2>
        <?php foreach ($news as $item): ?>
            <div class="card mb-4">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="/public/images/<?php echo htmlspecialchars($item['image']); ?>" 
                             class="img-fluid rounded-start" alt="<?php echo htmlspecialchars($item['title']); ?>">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="/news/<?php echo $item['id']; ?>" class="text-decoration-none">
                                    <?php echo htmlspecialchars($item['title']); ?>
                                </a>
                            </h5>
                            <p class="card-text"><?php echo substr(htmlspecialchars($item['content']), 0, 200) . '...'; ?></p>
                            <p class="card-text">
                                <small class="text-muted">
                                    Đăng ngày: <?php echo date('d/m/Y', strtotime($item['created_at'])); ?>
                                </small>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h3>Danh Mục</h3>
            </div>
            <div class="list-group list-group-flush">
                <?php foreach ($categories as $category): ?>
                    <a href="/category/<?php echo $category['id']; ?>" 
                       class="list-group-item list-group-item-action">
                        <?php echo htmlspecialchars($category['name']); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php include '../footer.php'; ?>