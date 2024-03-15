<?php

namespace App\Helpers;

use App\orders;
use App\Product;
use Carbon\Carbon;

function can_download_product($order_id, $product_id) {
    // Retrieve the order with eager loading to avoid N+1 problem
    $order = orders::with('products')->find($order_id);

    // Check if the order exists and is completed
    if ($order && $order->completed_at) {
        // Find the product within the order
        $product = $order->products->where('id', $product_id)->first();

        // Check if the product exists and is eligible for download
        if ($product) {
            $expiry_time = Carbon::parse($order->completed_at)->addHours($product->product_download_expiry);
            return $expiry_time >= Carbon::now();
        }
    }

    return false;
}
