<?php

use Ghasedak\GhasedakApi;

function imageUrl($image)
{
    return env('ADMIN_PANEL_URL') . env('PRODUCT_IMAGES_PATH') . $image;
}


function calculateDiscount($price, $salePrice)
{
    if ($price > 0) {
        return round((($price - $salePrice) / $price) * 100, 2);
    }
    return 0;
}

function sendOtpSms($cellphone, $opt)
{
    return 'Done';
    $api = new GhasedakApi(env('GHASEDAK_SMS_API_KEY'));
    $api->Verify(
        $cellphone,
        1,
        'otp',
        $opt
    );
}
