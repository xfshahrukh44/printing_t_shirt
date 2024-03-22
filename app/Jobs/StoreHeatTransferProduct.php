<?php

namespace App\Jobs;

use App\Models\ProductPrice;
use App\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class StoreHeatTransferProduct implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $product;
    protected $child_category;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($product, $child_category)
    {
        $this->product = $product;
        $this->child_category = $child_category;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            DB::beginTransaction();
            if (
            !$created_product = Product::firstOrCreate([
                'product_title' => $this->product['title'],
                'category' => $this->child_category->sub_categorys->categorys->id,
                'subcategory' => $this->child_category->sub_categorys->id,
            ],[
                'childsubcategory' => $this->child_category->id,
                'sku' => $this->product['sku'],
                'size' => $this->product['size'],
            ])
            ) { DB::rollBack(); $this->fail(); }

            //prices
            $mins = [1, 2, 6, 12];
            $maxs = [1, 5, 11, 99999999999999];
            $created_product->product_prices()->delete();
            foreach ($this->product['prices'] as $key => $rate) {
                ProductPrice::create([
                    'product_id' => $created_product->id,
                    'min' => $mins[$key],
                    'max' => $maxs[$key],
                    'rate' => $rate,
                ]);
            }

            //feature image
            $upload_dir = 'uploads/products';
            $unique_file_name = uniqid() . '_' . basename($this->product['feature_image']);
            $destinationPath = public_path($upload_dir) . DIRECTORY_SEPARATOR . $unique_file_name;
            $imageData = file_get_contents($this->product['feature_image']);
            if ($imageData !== false) {
                if (file_put_contents($destinationPath, $imageData) !== false) {
                    $created_product->image = $upload_dir . '/' . $unique_file_name;
                    $created_product->save();
                }
            }

            DB::commit();
        } catch (\Exception $e) {
            Log::error('Error processing StoreHeatTransferProduct job: ' . $e->getMessage());
            DB::rollBack();
            $this->fail($e);
        }
    }
}
