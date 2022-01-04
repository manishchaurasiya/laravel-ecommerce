<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\category;
use App\Models\Color;
use App\Models\Order;
use App\Models\product;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

class VendorController extends Controller
{
    public function dashboard()
    {
        $Username = User::find(Auth::user()->id)->name;

        // $useDetail=Order::with('userDetail')->get();
        $orders = Order::with('product', 'userDetail')->where('vendor_id', auth()->user()->id)->get();
        // dd($orders->toArray());

        return view('vendor.vendorDashboard', compact('Username', 'orders'));
    }

    public function products()
    {
        $products = product::get();

        return view('vendor.products', ['products' => $products]);
    }
    //   show Add product Blade file

    public function addProducts()
    {
        $Brands = Brand::get();
        $Colors = Color::get();
        $Categories = category::get();
        return view('vendor.addProduct', compact('Brands', 'Colors', 'Categories'));
    }


    public function profile()
    {
        $data = User::find(auth()->user()->id);
        // dd($data->toArray());
        return view('vendor.profile', ['data' => $data]);
    }

    public function updateProfilePic(Request $request)
    {
    //   dd($request->toArray());
        $request->validate([
                'file' => 'required|mimes:jpg,png'
        ]);
        $model = User::find(auth()->user()->id);

        if ($request->hasFile('file')) {
            $oldphoto = $model->profile_pic;
            $fileName = $request->file('file')->getClientOriginalName();
            $fileName = rand(1111, 9999) . "_" . $fileName;
            $path = $request->file('file')->storeAs('profile', $fileName, 'public');
            $model->profile_pic = $fileName;
            if ($path) {
                if (Storage::exists('public/profile/' . $oldphoto)) {
                    Storage::delete('public/profile/' . $oldphoto);
                }
            }
        }
        $model->save();
        return redirect()->back();
    }

    public function deleteProfilePic()
    {
        $model = User::find(auth()->user()->id);

        $oldphoto = $model->profile_pic;
        $model->profile_pic = "NULL";
        if (Storage::exists('public/profile/' . $oldphoto)) {
            Storage::delete('public/profile/' . $oldphoto);
        }
        $model->save();
        return redirect()->back();
    }

    public function updateProfile( Request $request)
    {
        $validation =$request->validate([
            'name' =>'required',
            'email' => 'required',
            'phone' => 'Required|min:10|max:10'
        ]);

        User::updateOrCreate(
            ['id' => auth()->user()->id],
            ['name' => $request->name,'email'=>$request->email,'phone_no'=> $request->phone]
        );
        return redirect()->back()->with('success','Profile updated successfully!');
    }



    // insert data product data into product table 

    public function insertProduct(Request $request)
    {
        // dd($request->file('thumbnail'));
        $images = $request->file('thumbnail');
        $response = product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'color_id' => $request->color_id,
            'brand_id' => $request->brand_id,
            'vendor_id' =>  auth()->user()->id,
            'category_id' => $request->category_id
        ]);

        //    dd($response->id);
        //    dd($images);

        for ($i = 0; $i < count($images); $i++) {
            $fileName = $images[$i]->getClientOriginalName();
            $imageName = $images[$i]->storeAs('productImages', $fileName, 'public');
            ProductImage::create([
                'product_id' => $response->id,
                'type' => ($i == 0) ? 'thumbnail' : 'gallery',
                'file' => $imageName,
            ]);
        }

        return redirect('vendor/products');
    }

    public function editProduct(Request $request, $id) 
    {
        $categories = category::get();
        $colors = Color::get();
        $brands = Brand::get();
        $productDetails = product::find($id);
        // dd($productDetails->toArray());
        return view('vendor.editProduct', compact('categories', 'productDetails', 'colors','brands'));
    }

    public function updateProduct(Request $request, $id)
    {
        // dd($id);
        $update = product::updateOrCreate(
            ['id'=> $id],
            ['name' => $request->name, 'description' => $request->description, 'category_id' => $request->category, 'color_id' => $request->color, 'brand_id' => $request->brand, 'vendor_id' =>auth()->user()->id, 'price' => $request->price ]
        );

        // return redirect('/vendor/products');
        return redirect()->back();
    }


    public function deleteProduct($id)
    {
        $product = product::find($id);
        $product->delete();
        return redirect()->back();
    }



    public function changeStatus($id)
    {
        $update = ['status' => 'changeStatus'];
        $response = Order::find($id)->update(['status' => 'Completed']);
        // dd($response->toArray());

        return redirect()->back()->with('success', 'Status updated successfully!');
    }
}
