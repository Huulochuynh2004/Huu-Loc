<?php include 'app/views/shares/header.php'; ?>

<div class="container mt-4">
    <div class="row">
        <!-- Hiển thị hình ảnh sản phẩm -->
        <div class="col-md-6">
            <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                <img src="<?php echo (!empty($product->image)) ? '/webbanhang/' . ltrim(htmlspecialchars($product->image, ENT_QUOTES, 'UTF-8'), '/') : 'https://via.placeholder.com/400'; ?>" 
                     class="card-img-top p-3"
                     alt="Product Image"
                     style="border-radius: 12px; object-fit: cover; max-height: 400px; transition: transform 0.3s;"
                     onmouseover="this.style.transform='scale(1.05)';"
                     onmouseout="this.style.transform='scale(1)';">
            </div>
        </div>

        <!-- Hiển thị thông tin sản phẩm -->
        <div class="col-md-6">
            <h2 class="fw-bold text-dark"><?php echo htmlspecialchars($product->name ?? 'Không có tên', ENT_QUOTES, 'UTF-8'); ?></h2>
            
            <p class="text-muted">📦 Danh mục: 
                <strong>
                    <?php echo isset($product->category_name) ? htmlspecialchars($product->category_name, ENT_QUOTES, 'UTF-8') : 'Không xác định'; ?>
                </strong>
            </p>
            
            <h4 class="fw-bold text-danger">💰 
                <?php echo isset($product->price) ? number_format($product->price, 0, ',', '.') . ' VND' : 'Liên hệ'; ?>
            </h4>
            
            <p class="text-muted mt-3" style="line-height: 1.8;">
                <?php echo isset($product->description) ? nl2br(htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8')) : 'Chưa có mô tả'; ?>
            </p>

            <!-- Nút thao tác -->
            <div class="mt-4 d-flex gap-3">
                <?php if (isset($product->id)): ?>
                    <a href="/webbanhang/Product/addToCart/<?php echo $product->id; ?>" 
                       class="btn text-white fw-bold px-4 py-2"
                       style="background-color: #d4af37; border-radius: 8px; transition: 0.3s;"
                       onmouseover="this.style.backgroundColor='#e4c177';">
                       🛒 Thêm vào giỏ
                    </a>
                <?php endif; ?>

                <a href="/webbanhang/Product" 
                   class="btn text-white fw-bold px-4 py-2"
                   style="background-color: #2c3e50; border-radius: 8px; transition: 0.3s;"
                   onmouseover="this.style.backgroundColor='#1a252f';">
                   ◀️ Quay lại
                </a>
            </div>
        </div>
    </div>
</div>

<?php include 'app/views/shares/footer.php'; ?>
