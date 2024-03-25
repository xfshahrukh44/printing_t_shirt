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

class StoreStarterPackProduct implements ShouldQueue
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

            $product = Product::where([
                'product_title' => $this->product['product_title'],
                'category' => $this->child_category->sub_categorys->categorys->id,
                'subcategory' => $this->child_category->sub_categorys->id,
            ])->first();
            $product->additional_information = $this->product['additional_information'];
            $product->save();

//            if (
//            !$created_product = Product::firstOrCreate([
//                'product_title' => $this->product['product_title'],
//                'category' => $this->child_category->sub_categorys->categorys->id,
//                'subcategory' => $this->child_category->sub_categorys->id,
//            ],[
////                'childsubcategory' => $this->child_category->id,
////                'sku' => $this->product['sku'],
////                'size' => $this->product['size'],
////                'description' => $this->product['description'],
//                'additional_information' => $this->product['additional_information'],
//            ])
//            ) { DB::rollBack(); $this->fail(); }

//            //prices
//            if (is_array($this->product['price'])) {
//                $created_product->product_prices()->delete();
//                foreach ($this->product['price'] as $key => $product_price) {
//                    ProductPrice::create([
//                        'product_id' => $created_product->id,
//                        'min' => $product_price['min'],
//                        'max' => $product_price['max'],
//                        'rate' => $product_price['rate'],
//                    ]);
//                }
//            } else {
//                $created_product->price = $this->product['price'];
//                $created_product->save();
//            }
//
//            //feature image
//            $upload_dir = 'test';
//            $unique_file_name = uniqid() . '_' . basename($this->product['feature_image']);
//            $destinationPath = storage_path($upload_dir) . DIRECTORY_SEPARATOR . $unique_file_name;
//            $imageData = file_get_contents($this->product['feature_image']);
//            if ($imageData !== false) {
//                if (file_put_contents($destinationPath, $imageData) !== false) {
//                    $created_product->image = 'uploads/products/' . $unique_file_name;
//                    $created_product->save();
//                }
//            }
//
//            //product images
//            foreach ($this->product['product_images'] as $product_image_url) {
//                $upload_dir = 'test';
//                $unique_file_name = uniqid() . '_' . basename($product_image_url);
//                $destinationPath = storage_path($upload_dir) . DIRECTORY_SEPARATOR . $unique_file_name;
//                $imageData = file_get_contents($product_image_url);
//                if ($imageData !== false) {
//                    if (file_put_contents($destinationPath, $imageData) !== false) {
//                        $created_product->image = 'uploads/products/' . $unique_file_name;
//                        $created_product->save();
//
//                        DB::table('product_imagess')->insert([
//                            ['image' => ('uploads/products/' . $unique_file_name), 'product_id' => $created_product->id]
//                        ]);
//                    }
//                }
//            }

            DB::commit();
        } catch (\Exception $e) {
            Log::error('Error processing StoreHeatTransferProduct job: ' . $e->getMessage());
            DB::rollBack();
            $this->fail($e);
        }
    }
}
