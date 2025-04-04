<?php include 'app/views/shares/header.php'; ?>
<div class="container mt-5">
    <h1 class="text-center mb-4">Thanh toán</h1>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm p-4">
                <form method="POST" action="/webbanhang/Product/processCheckout">
                    <div class="mb-3">
                        <label for="name" class="form-label">Họ tên:</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Số điện thoại:</label>
                        <input type="number" id="phone" name="phone" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Địa chỉ:</label>
                        <textarea id="address" name="address" class="form-control" required></textarea>
                    </div>
                    
                    <h5 class="text-center mt-4">Chọn phương thức thanh toán</h5>
                    <div class="mb-3 d-flex justify-content-between">
                        <button type="button" class="btn btn-outline-primary w-45">Thẻ tín dụng</button>
                        <button type="button" class="btn btn-outline-success w-45">Chuyển khoản ngân hàng</button>
                    </div>
                    
                    <div class="mb-3">
                        <label for="card-number" class="form-label">Số thẻ:</label>
                        <input type="text" id="card-number" name="card_number" class="form-control" placeholder="1234 5678 9012 3456">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="expiry" class="form-label">Ngày hết hạn:</label>
                            <input type="text" id="expiry" name="expiry" class="form-control" placeholder="MM/YY">
                        </div>
                        <div class="col-md-6">
                            <label for="cvv" class="form-label">CVV:</label>
                            <input type="text" id="cvv" name="cvv" class="form-control" placeholder="123">
                        </div>
                    </div>
                    
                    <h5 class="text-center mt-4">Hoặc quét mã QR để thanh toán</h5>
                    <div class="text-center mb-3">
                        <button type="button" class="btn btn-info" onclick="toggleQRCode()">Quét mã QR</button>
                        <div id="qrCodeContainer" class="mt-3" style="display: none;">
                            <img src="/webbanhang/uploads/qr.jpeg" alt="QR Code Thanh Toán" class="img-fluid" style="max-width: 400px;">
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100 mt-4">Thanh toán ngay</button>
                </form>
                <a href="/webbanhang/Product/cart" class="btn btn-secondary w-100 mt-3">Quay lại giỏ hàng</a>
            </div>
        </div>
    </div>
</div>
<script>
    function toggleQRCode() {
        var qrCodeContainer = document.getElementById("qrCodeContainer");
        if (qrCodeContainer.style.display === "none") {
            qrCodeContainer.style.display = "block";
        } else {
            qrCodeContainer.style.display = "none";
        }
    }
</script>
<?php include 'app/views/shares/footer.php'; ?>