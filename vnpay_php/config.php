<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

$vnp_TmnCode = "WF1HBMRI";
$vnp_HashSecret = "ZVTRUFPREIWTKXTBEUWJPFGLSGRIVHZQ";
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "http://localhost/duan1/vnpay_php/vnpay_return.php";
$vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";

$startTime = date("YmdHis");
$expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));
