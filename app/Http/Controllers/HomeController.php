<?php

namespace App\Http\Controllers;

use Stripe;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Color;
use App\Models\Order;
use App\Models\Payment;
use App\Models\ProductImage;
use App\Models\User;
use CreateRolesTable;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::where('status','Active')->get();
        // $products = Product::with(['Thumbnail','Brand'])
        $products = Product::with(['Thumbnail','Brand'])->where('status','Active')->get();

        // dd($products->toArray());
        $smartphones = Product::with('Thumbnail')->where([['category_id', 1],['status','Active']])->take(8)->get();
        $watches = Product::with('Thumbnail')->where([['category_id', 2],['status','Active']])->take(8)->get();
        $laptops = Product::with('Thumbnail')->where([['category_id', 3],['status','Active']])->take(8)->get();
        $tablets = Product::with('Thumbnail')->where([['category_id', 4],['status','Active']])->take(8)->get();

        // dd($watches->toArray());
        if (session()->has('url.intended')) {
            $url = session('url.intended');
            session()->forget('url.intended');
            return redirect($url);
        }
        return view('home2', compact('products', 'categories', 'smartphones', 'watches', 'laptops', 'tablets'));
    }

    public function checkout(Request $request, $id)
    {
        // dd($request->all());
        $products = Product::find($id);
        $userDetail = User::find(Auth()->user()->id);
        $totalPrice = $products->price * $request->product_quatity;
        return view('checkOut', compact('totalPrice', 'products', 'userDetail'));
    }

    public function order(Request $request, $id)
    {
        Stripe\Stripe::setApiKey('sk_test_51Jvy5USGXOKFwj9elLz4ETwbPuk73xT4vdpa0MIjcnCw7MTypdwUJoAlbAldpbXgASZEWuhPNHigy0qyNQpmlXHM00zgcO7ZnW');
        $status = Stripe\Charge::create([
            "amount" => $request->total_price * 100,
            "currency" => "INR",
            "source" => $request->stripeToken,
            "description" => "Test payment from itsolutionstuff.com."
        ]);

        Session()->flash('success', 'Payment successful!');
        // dd($request->all(), $status->toArray());
        $products = Product::find($id);
        $responce = Order::create([
            'customer_id' => auth()->user()->id,
            'vendor_id' => $products->vendor_id,
            'product_id' => $products->id,
            'price' => $request->total_price,
        ]);

        Payment::create([
            'payment_id' => $status->id,
            'price' => $request->total_price,
            'customer_id' => auth()->user()->id,
            'vendor_id' => $products->vendor_id,
            'product_id' => $products->id,
            'status' => $status->status
        ]);

        return redirect('/order-success');
    }
    public function myOrder()
    {
        $orders = Order::with('product')->where('customer_id', auth()->user()->id)->get();
        // dd($orders->toArray());
        return view('myOrder', compact('orders'));
    }

    public function productDetail(Product $product)
    {
        $relatedProducts = $product->load(['Thumbnail', 'gallary'])->where([
            ['category_id', $product->category_id],
            ['id', '<>', $product->id]
        ])->get();

        $products = $product->load(['Thumbnail', 'gallary', 'Review']);
        // dd($products->toArray());
        //   var_dump($products);

        return view('productDetail', compact('products', 'relatedProducts'));
    }



    public function shop(Request $request)
    {
        $categories = category::get();
        $colors = Color::get();
        $brands = Brand::get();

        $products = Product::with('Thumbnail')->when(!is_null($request->category), function ($q) use ($request) {
            $q->where('category_id', $request->category);
        })->paginate(6);

        if ($request->brand) {
            $products = Product::with('Thumbnail')->when(!is_null($request->brand), function ($q) use ($request) {
                $q->where('brand_id', $request->brand);
            })->paginate(6);
        } elseif ($request->color) {
            $products = Product::with('Thumbnail')->when(!is_null($request->color), function ($q) use ($request) {
                $q->where('color_id', $request->color);
            })->paginate(6);
        }

        return view('shop', compact('categories', 'colors', 'brands', 'products'));
    }

    public function search(Request $request)
    {
        $searchDatas = Product::with('Thumbnail')->where('name', 'like', '%' . $request->search . '%')->get();

        return view('search', compact('searchDatas'));
    }

    public function updateStatus(Request $request)
    {
        $update = Order::where('id', $request->id)->update(['status' => $request->status]);
        // dd($update);
        return redirect()->back();
    }
}
