<?php include 'app/views/shares/header.php'; ?>
<div class="container mt-5">
    <h1 class="text-center mb-4">Giỏ hàng của bạn</h1>
    
    <?php if (!empty($cart)): ?>
        <ul class="list-group">
            <?php foreach ($cart as $id => $item): ?>
                <li class="list-group-item cart-item d-flex align-items-center p-3 shadow-sm rounded">
                    <input type="checkbox" class="select-item me-3" style="width: 25px; height: 25px; cursor: pointer;">
                    
                    <img src="/webbanhang/<?php echo $item['image']; ?>" alt="Product Image" class="rounded" style="width: 100px; height: 100px; object-fit: cover;">
                    
                    <div class="ms-3 flex-grow-1">
                        <h5><?php echo htmlspecialchars($item['name'], ENT_QUOTES, 'UTF-8'); ?></h5>
                        <p class="text-muted mb-1">Giá: <span class="price"><?php echo htmlspecialchars($item['price'], ENT_QUOTES, 'UTF-8'); ?></span> $</p>
                        <div class="d-flex align-items-center">
                            <button class="btn btn-outline-danger decrease">-</button>
                            <input type="text" value="<?php echo htmlspecialchars($item['quantity'], ENT_QUOTES, 'UTF-8'); ?>" class="form-control mx-2 quantity text-center" style="width: 50px;" readonly>
                            <button class="btn btn-outline-success increase">+</button>
                        </div>
                    </div>
                    <button class="btn btn-outline-warning remove-item">Xóa</button>
                </li>
            <?php endforeach; ?>
        </ul>
        
        <h4 class="text-end mt-3">Tổng tiền: <span id="total-price">0</span> $</h4>
        <button id="saveChanges" class="btn btn-primary w-100 mt-3">Lưu Thay Đổi</button>
    <?php else: ?>
        <p class="text-center">Giỏ hàng của bạn đang trống.</p>
    <?php endif; ?>
    
    <div class="d-flex justify-content-between mt-3">
        <a href="/webbanhang/Product" class="btn btn-secondary">Tiếp tục mua sắm</a>
        <a href="/webbanhang/Product/checkout" class="btn btn-success">Thanh Toán 💵</a>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    function updateTotal() {
        let total = 0;
        document.querySelectorAll(".select-item:checked").forEach(item => {
            let price = parseFloat(item.closest(".cart-item").querySelector(".price").textContent);
            let quantity = parseInt(item.closest(".cart-item").querySelector(".quantity").value);
            total += price * quantity;
        });
        document.getElementById("total-price").textContent = total.toFixed(2);
    }
    
    document.querySelectorAll(".select-item").forEach(item => {
        item.addEventListener("change", updateTotal);
    });
    
    document.querySelectorAll(".increase").forEach(button => {
        button.addEventListener("click", function() {
            let quantityInput = this.previousElementSibling;
            quantityInput.value = parseInt(quantityInput.value) + 1;
            updateTotal();
        });
    });

    document.querySelectorAll(".decrease").forEach(button => {
        button.addEventListener("click", function() {
            let quantityInput = this.nextElementSibling;
            if (parseInt(quantityInput.value) > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
                updateTotal();
            }
        });
    });

    document.querySelectorAll(".remove-item").forEach(button => {
        button.addEventListener("click", function() {
            this.closest(".cart-item").remove();
            updateTotal();
        });
    });
});
</script>

<style>
.list-group-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-radius: 10px;
    margin-bottom: 10px;
    transition: all 0.3s ease-in-out;
}
.list-group-item:hover {
    background-color: #f8f9fa;
    transform: scale(1.02);
}
button {
    transition: 0.3s;
}
button:hover {
    transform: scale(1.1);
}
</style>

<?php include 'app/views/shares/footer.php'; ?>