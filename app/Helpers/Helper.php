<?php

namespace App\Helpers;

use App\orders;
use App\Product;
use Carbon\Carbon;

function can_download_product ($order_id, $product_id) {
    $order = orders::where('id',$order_id)->first();
    $product = Product::find($product_id);

    return (bool) (
        !is_null($order->completed_at) &&
        (Carbon::parse($order->completed_at)->addHours($product->product_download_expiry) >= Carbon::now())
    );
}
