function checkLogout(){
    return confirm('Bạn có muốn đăng xuất không?');
}
function checkOut(){
    return confirm('Thanh toán ngay');
}

setTimeout(function() {
    var alert = document.getElementById('success-alert');
    if (alert) {
        alert.style.transition = 'opacity 0.5s ease';
        alert.style.opacity = '0';
        setTimeout(function() {
            alert.remove();
        }, 500); 
    }
}, 1500);

// Checkout VNPay
function prepareVNPayForm() {
    document.getElementById('vnpay-firstName').value = document.querySelector('[name="firstName"]').value;
    document.getElementById('vnpay-lastName').value = document.querySelector('[name="lastName"]').value;
    document.getElementById('vnpay-address').value = document.querySelector('[name="address"]').value;
    document.getElementById('vnpay-phone').value = document.querySelector('[name="phone"]').value;
    document.getElementById('vnpay-email').value = document.querySelector('[name="email"]').value;
    return true;
}