<?php
session_start();

// Kiểm tra xem giỏ hàng đã tồn tại chưa
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Kiểm tra xem dữ liệu POST có hợp lệ không
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'], $_POST['action'])) {
    $product_id = $_POST['product_id'];
    $action = $_POST['action'];

    // Kiểm tra xem sản phẩm có trong giỏ hàng không
    if (isset($_SESSION['cart'][$product_id])) {
        if ($action === 'increase') {
            $_SESSION['cart'][$product_id]['quantity']++;
        } elseif ($action === 'decrease') {
            if ($_SESSION['cart'][$product_id]['quantity'] > 1) {
                $_SESSION['cart'][$product_id]['quantity']--;
            } else {
                unset($_SESSION['cart'][$product_id]); // Xóa sản phẩm nếu số lượng về 0
            }
        }
    }
}

// Thêm thông báo cập nhật giỏ hàng
$_SESSION['message'] = "Cập nhật giỏ hàng thành công.";

// Chuyển hướng trở lại trang giỏ hàng
header("Location: /webbanhang/Cart");
exit();