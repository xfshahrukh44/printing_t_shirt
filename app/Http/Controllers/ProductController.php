<?php

namespace App\Http\Controllers;

use App\Models\ProductPrice;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\inquiry;

use App\newsletter;
use App\Program;
use App\imagetable;
use SoapClient;
use App\Product;
use App\Category;
use App\Banner;
use App\ProductAttribute;
use DB;
use View;
use Session;
use App\Http\Traits\HelperTrait;
use App\orders;
use App\orders_products;
use Illuminate\Contracts\Session\Session as SessionSession;

class ProductController extends Controller
{
	use HelperTrait;
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	// use Helper;

	public function __construct()
	{
		//$this->middleware('auth');
		$logo = imagetable::select('img_path')
			->where('table_name', '=', 'logo')
			->first();

		$favicon = imagetable::select('img_path')
			->where('table_name', '=', 'favicon')
			->first();

		View()->share('logo', $logo);
		View()->share('favicon', $favicon);
		//View()->share('config',$config);
	}

	public static function index1(Request $request)
	{
	    $filters = [
	        'query' => $request->has('query') ? $request->get('query') : null,
	        'subcategory' => $request->has('subcategory') ? $request->get('subcategory') : null,
	        'childsubcategory' => $request->has('childsubcategory') ? $request->get('childsubcategory') : null,
        ];

		$products = new Product;
		if (isset($_GET['q']) && $_GET['q'] != '') {

			$keyword = $_GET['q'];

			$products = $products->where(function ($query)  use ($keyword) {
				$query->where('product_title', 'like', $keyword);
			});
		}

		$products = $products->orderBy('id', 'asc')
            ->when(!is_null($filters['query']), function ($q) use ($filters) {
                return $q->where(function ($q) use ($filters) {
                    return $q->where('product_title', 'LIKE', '%'.$filters['query'].'%')->orWhere('description', 'LIKE', '%'.$filters['query'].'%');
                });
            })
            ->when(!is_null($filters['subcategory']), function ($q) use ($filters) {
                return $q->where('subcategory', intval($filters['subcategory']));
            })
            ->when(!is_null($filters['childsubcategory']), function ($q) use ($filters) {
                return $q->where('childsubcategory', intval($filters['childsubcategory']));
            })
//            ->whereHas('categorys', function ($q) {
//                return $q->where('type', 0);
//            })
//            ->get();
            ->paginate(12)
            ->withQueryString();

		$subcategories = Subcategory::
//        where(function ($q) {
//		    return $q->whereIn('subcategory', ['Vinyl By Type', 'Vinyl By Brand']);
//        })
//        ->orWhere(function ($q) {
//            return $q->whereHas('category', function ($q) {
        //override
//            whereHas('category', function ($q) {
//                return $q->where('type', 0);
//            })
//            });
//        })
        //override
//        ->whereNotIn('subcategory', ['Vinyl Cutters & Accessories', 'Featured', 'Starter Packages'])
//        ->with('child_sub_categories.products')->get();
        with('child_sub_categories.products')->get();

		return view('product1', ['products' => $products, 'subcategories' => $subcategories, 'filters' => $filters]);
	}

	public static function index2(Request $request)
	{
	    $filters = [
	        'query' => $request->has('query') ? $request->get('query') : null,
	        'subcategory' => $request->has('subcategory') ? $request->get('subcategory') : null,
	        'childsubcategory' => $request->has('childsubcategory') ? $request->get('childsubcategory') : null,
        ];

		$products = new Product;
		if (isset($_GET['q']) && $_GET['q'] != '') {

			$keyword = $_GET['q'];
		}

        $products = $products->orderBy('id', 'asc')
            ->when(!is_null($filters['query']), function ($q) use ($filters) {
                return $q->where(function ($q) use ($filters) {
                    return $q->where('product_title', 'LIKE', '%'.$filters['query'].'%')->orWhere('description', 'LIKE', '%'.$filters['query'].'%');
                });
            })
            ->when(!is_null($filters['subcategory']), function ($q) use ($filters) {
                return $q->where('subcategory', intval($filters['subcategory']));
            })
            ->when(!is_null($filters['childsubcategory']), function ($q) use ($filters) {
                return $q->where('childsubcategory', intval($filters['childsubcategory']));
            })
//            ->whereHas('categorys', function ($q) {
//                return $q->where('type', 1);
//            })
//            ->get();
            ->paginate(12)
            ->withQueryString();

        $subcategories = Subcategory::
        whereHas('category', function ($q) {
            return $q->where('type', 1);
        })
        ->whereNotIn('subcategory', ['Vinyl Cutters & Accessories', 'Featured', 'Starter Packages'])
        ->with('child_sub_categories.products')->get();

		return view('product2', ['products' => $products, 'subcategories' => $subcategories, 'filters' => $filters]);
	}

	public function detail2(Request $request, $id)
	{
		$product = Product::find($id);

		$related_products = Product::where('id', '!=', $product->id)
            ->where('category', $product->category)
            ->orWhere('subcategory', $product->subcategory)
            ->orWhere('childsubcategory', $product->childsubcategory)
            ->get()->take(8);

		$featured_products = Product::where('id', '!=', $product->id)->where('childsubcategory', $product->childsubcategory)->get()->take(8);

		return view('product_detail', [
            'product' => $product,
            'related_products' => $related_products,
            'featured_products' => $featured_products
        ]);
	}

	public function index()
	{
		$products = new Product;
		if (isset($_GET['q']) && $_GET['q'] != '') {

			$keyword = $_GET['q'];

			$products = $products->where(function ($query)  use ($keyword) {
				$query->where('product_title', 'like', $keyword);
			});
		}
		$products = $products->orderBy('id', 'asc')->get();
		return view('products', ['products' => $products]);
	}

	public function productDetail($id)
	{

		$product = new Product;
		$product_detail = $product->where('id', $id)->first();
		$products = DB::table('products')->get()->take(10);
		return view('product_detail', ['product_detail' => $product_detail, 'products' => $products]);
	}

	public function categoryDetail($id)
	{

		$category = new Category;

		$category = DB::table('products')->where('category', '=', $id)->get()->toArray();
		return view('shop.category_detail', ['category' => $category]);
	}


	public function cart()
	{
		$page = DB::table('pages')->where('id', 2)->first();
		$cartCount = COUNT(Session::get('cart'));
		$language = Session::get('language');
		$product_detail = DB::table('products')->first();
		//if (Session::get('cart') && count(Session::get('cart')) > 0) {
			return view('shop.cart', ['cart' => Session::get('cart'), 'language' => $language, 'product_detail' => $product_detail, 'page' => $page]);
		//} else {
			//Session::flash('flash_message', 'No Product found');
			//Session::flash('alert-class', 'alert-success');
			//return redirect('/');
		//}
	}

	public function saveCart(Request $request)
	{
		$var_item = $request->variation;

		// dd($var_item);

		$result = array();


		$product_detail = DB::table('products')->where('id', $request->product_id)->first();


		$id = isset($request->product_id) ? $request->product_id : '';
		$qty = isset($request->qty) ? intval($request->qty) : '1';
		$color = $request->has('color') ? $request->get('color') : null;

		// dd($qty);

		$cart = array();
		$cartId = $id;
		if (Session::has('cart')) {

			$cart = Session::get('cart');
		}

		$price = $product_detail->price;


		if ($id != "" && intval($qty) > 0) {

			if (array_key_exists($cartId, $cart)) {
				unset($cart[$cartId]);
			}

			$productFirstrow = Product::where('id', $id)->first();


			$cart[$cartId]['id'] = $id;
			$cart[$cartId]['name'] = $productFirstrow->product_title;
			$cart[$cartId]['color'] = $color;

			//use case: pricing for type 1 products
            if (count($productFirstrow->product_prices) > 0 ) {
                $price = ProductPrice::where('product_id', $productFirstrow->id)->where('min', '<=', $qty)->where('max', '>=', $qty)->first();
                $price = $price->rate ?? ($product_detail->price ?? 0.00);
//            }
//            if ($productFirstrow->category->type == 0) {
//                if ($qty == 1) {
//                    $price = $productFirstrow->price;
//                } else if ($qty >= 2 && $qty <=5) {
//                    $price = $productFirstrow->price2;
//                } else if ($qty >= 6 && $qty <=11) {
//                    $price = $productFirstrow->price3;
//                } else if ($qty >= 12) {
//                    $price = $productFirstrow->price4;
//                } else {
//                    $price = $product_detail->price;
//                }
            } else {
                $price = $product_detail->price;
            }

            $cart[$cartId]['baseprice'] = $price;
            $cart[$cartId]['qty'] = $qty;
			$cart[$cartId]['variation_price'] = 0;

			foreach ($var_item as $key => $value) {
				$data = ProductAttribute::where('product_id', $_POST['product_id'])->where('value', $value)->first();

				$cart[$cartId]['variation'][$data->id]['attribute'] = 	$data->attribute->name;
				$cart[$cartId]['variation'][$data->id]['attribute_val'] = 	$data->attributesValues->value;
				$cart[$cartId]['variation'][$data->id]['attribute_price'] = 	$data->price;
				$cart[$cartId]['variation_price'] += $data->price;

			}

			// dd($cart);

			Session::put('cart', $cart);

			Session::flash('message', 'Product Added to cart Successfully');
			Session::flash('alert-class', 'alert-success');
			return redirect('/cart');

		} else {

			Session::flash('flash_message', 'Sorry! You can not proceed with 0 quantity');
			Session::flash('alert-class', 'alert-success');
			return back();

		}

	}
	public function updateCart()
	{
//	    dd($_POST);

		$cart = Session::get('cart');
		$pro_id = $_POST['product_id'];
        $product_detail = DB::table('products')->where('id', $pro_id)->first();
		$qty = $_POST['qty'];
		$count = 0;
		if (sizeof($_POST['row']) >= 1) {
			foreach ($cart as $key => $value) {
				foreach ($value as $key_item => $value_item) {
					if ($key_item == 'qty') {
						$cart[$key][$key_item] = (int)($_POST['row'][$count]);
					}
				}
				$count = $count + 1;
			}
		}



		// $productFirstrow = Product::where('id', $pro_id)->first();
		// $cart[$pro_id]['id'] = $pro_id;
		// $cart[$pro_id]['name'] = $productFirstrow->product_title;
		// $cart[$pro_id]['baseprice'] = $productFirstrow->price;
		// $cart[$pro_id]['qty'] = $qty;


		$variation_total = 0;
		foreach ($cart[$pro_id]['variation'] as $key => $value) {
			$variation_total += floatval($value['attribute_price']);
		}

//		$cart[$pro_id]['variation_price'] = $variation_total * $qty;
		$cart[$pro_id]['variation_price'] = $variation_total * $cart[$pro_id]['qty'];

		Session::put('cart', $cart);
		Session::flash('message', 'Your Cart Updated Successfully');
		Session::flash('alert-class', 'alert-success');
		return redirect('/cart');
//		return redirect('/checkout');
	}


	public function removeCart($id)
	{

		//$id = isset($_POST['ArrayofArrays'][0]) ? $_POST['ArrayofArrays'][0] : '';

		if ($id != "") {

			if (Session::has('cart')) {

				$cart = Session::get('cart');
			}

			if (array_key_exists($id, $cart)) {

				unset($cart[$id]);
			}

			Session::put('cart', $cart);
		}

		// echo 'success';
		Session::flash('flash_message', 'Product item removed successfully');
		Session::flash('alert-class', 'alert-success');
		return back();
	}


	public function clearCart(Request $request)
	{
       Session::put('cart', []);

		// echo 'success';
		Session::flash('flash_message', 'Cart cleared successfully');
		Session::flash('alert-class', 'alert-success');
        return redirect('/cart');
	}

	public function shop()
	{
		$page = DB::table('pages')->where('id', 2)->first();

		$shops = DB::table('products')
			->join('categories', 'products.category', '=', 'categories.id')
			->select('products.*', 'categories.name as category_title')
			->get();


		return view('shop.shop', compact('shops', 'page'));
	}

	public function shopDetail($id)
	{

		$product = new Product;
		$product_detail = $product->where('id', $id)->first();
		$att_model = ProductAttribute::groupBy('attribute_id')->where('product_id', $id)->get();
		$att_id = DB::table('product_attributes')->where('product_id', $id)->get();
		$shops = DB::table('products')
			->join('categories', 'products.category', '=', 'categories.id')
			->select('products.*', 'categories.name as category_title')->take(3)->get();


		return view('shop.detail', compact('product_detail', 'shops', 'att_id', 'att_model'));
	}


	public function invoice($id)
	{

		$order_id = $id;
		$order = orders::where('id', $order_id)->first();
		$order_products = orders_products::where('orders_id', $order_id)->get();

		return view('account.invoice')->with('title', 'Invoice #' . $order_id)->with(compact('order', 'order_products'))->with('order_id', $order_id);;
	}

	public function checkout()
	{
//	    dd('here');
		if (Session::get('cart') && count(Session::get('cart')) > 0) {
			$countries = DB::table('countries')
				->get();
			return view('shop.checkout', ['cart' => Session::get('cart'), 'countries' => $countries]);
		} else {
			Session::flash('flash_message', 'No Product found');
			Session::flash('alert-class', 'alert-success');
			return redirect('/');
		}
	}


	public function language()
	{
		$languages = $_POST['id'];

		Session::put('language', $languages);

		Session::put('is_select_dropdown', 1);
		// Session::put('language',$languages);
		// $test = Session::get('language');

		// Session::put('test',$test);

		//return redirect('shop-detail/1', ['test'=>$test]);
	}

	public function shipping(Request $request)
	{

		$PostalCode = $request->country; // Zipcode you are shipping To

		define("ENV", "demo"); // demo OR live

		if (ENV == 'demo') {
			$client = new SoapClient("https://staging.postaplus.net/APIService/PostaWebClient.svc?wsdl");
			$Password =  '123456';
			$ShipperAccount =  'DXB51487';
			$UserName =  'DXB51487';
			$CodeStation =  'DXB';
		} else {
			$client = new SoapClient("https://etrack.postaplus.net/APIService/PostaWebClient.svc?singleWsdl");
			$Password =  '';
			$ShipperAccount =  '';
			$UserName =  '';
			$CodeStation =  '';
		}

		$params = array(
			'ShipmentCostCalculation' => array(
				'CI' => array(
					'Password' => $Password,
					'ShipperAccount' => $ShipperAccount,
					'UserName' => $UserName,
					'CodeStation' => $CodeStation,
				),
				"OriginCountryCode" => 'AE',
				"DestinationCountryCode" => $PostalCode,
				"RateSheetType" => 'DOC',
				"Width" => 1,
				"Height" => 1,
				"Length" => 1,
				"ScaleWeight" => 1,
			),
		);


		try {

			$d = $client->__SoapCall("ShipmentCostCalculation", $params);
			$d = json_decode(json_encode($d), true);

			if (isset($d['ShipmentCostCalculationResult']['Message']) and ($d['ShipmentCostCalculationResult']['Message'] == 'SUCCESS')) {
				$status = true;
				$rate = $d['ShipmentCostCalculationResult']['Amount'];
			} else {
				$status = false;
				$messgae = $d['ShipmentCostCalculationResult']['Message'];
			}
		} catch (SoapFault $exception) {
			$status = false;
			$messgae = "Error Found Please try Again";
		}

		//if($status):
		//	echo $rate;
		//else:
		//	echo $messgae;
		//endif;

		//}
		//$cart = Session::get('cart');



		if ($status) {

			$cart = Session::get('cart');
			$cart['shipping'] = $rate;
			//$cart['shipping_address'] = $_POST['shipping_address'];
			Session::put('cart', $cart);

			// return view('shop.cart', ['rate'=> $rate, 'cart'=> $cart]);
			return redirect('/cart');
		} else {
			Session::flash('flash_message', 'Error');
			Session::flash('alert-class', 'alert-success');
			return view('shop.cart', ['messgae' => $messgae]);
		}
		return view('shop.cart', ['messgae' => $messgae, 'cart' => $cart]);
	}
}
