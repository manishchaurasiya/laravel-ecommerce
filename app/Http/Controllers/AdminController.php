<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use PhpParser\Node\Expr\FuncCall;

class AdminController extends Controller
{
    public function dashboard()
    {
        $datas = User::with(['Role'])->where('role_id', '<>', 1)->get();
        // $datas= User::with(['Role','Category'])->get();
        // dd($datas->toArray());
        return view('admin.dashboard', compact('datas'));
    }

    public function Category()
    {
        $categories = Category::get();
        // dd($categories);
        return view('admin.addCategory', compact('categories'));
    }

    public function Brand()
    {
        $brands = Brand::get();
        // dd($brands->toArray());
        return view('admin.addBrand', compact('brands'));
    }
    public function Color()
    {
        $colors = Color::get();
        // dd($colors->toArray());
        return view('admin.addColor', compact('colors'));
    }


    public function addCategory(Request $request)
    {
        $categories = Category::where('name', $request->name)->get();
        if ($categories->isEmpty()) {
            $request->validate([
                'name' => 'required|alpha'
            ]);

            Category::create([
                'name' => $request->name,
            ]);
            return redirect()->back()->with('success', 'Category added successfully!');
        } else {
            return redirect()->back()->with('exist', 'Category already exist!');
        }
    }

    public function deleteCategory($id)
    {
        Category::find($id)->delete();
        return redirect()->back()->with('delete', 'Category deleted successfully!');
    }

    public function addBrand(Request $request)
    {
        $brands = Brand::where('brand', $request->name)->get();
        if ($brands->isEmpty()) {
            $request->validate([
                'name' => 'required|alpha'
            ]);

            Brand::create([
                'brand' => $request->name,
            ]);
            return redirect()->back()->with('success', 'Brand added successfully!');
        } else {
            return redirect()->back()->with('exist', 'Brand already exist!');
        }
    }

    public function deleteBrand($id)
    {
        Brand::find($id)->delete();
        return redirect()->back()->with('delete', 'Color deleted successfully!');
    }


    public function addColor(Request $request)
    {
        $colors = Color::where('color', $request->name)->get();
        if ($colors->isEmpty()) {
            $request->validate([
                'name' => 'required|alpha'
            ]);

            Color::create([
                'color' => $request->name,
            ]);
            return redirect()->back()->with('success', 'Color added successfully!');
        } else {
            return redirect()->back()->with('exist', 'Color already exist!');
        }
    }

    public function deleteColor($id)
    {
        Color::find($id)->delete();
        return redirect()->back()->with('delete', 'Color deleted successfully!');
    }


    public function ChangeStatus($id)
    {
        $users = User::find($id);
        if ($users->status == 'Active') {
            User::find($id)->update(['status' => 'Inactive']);
            return redirect()->back()->with('success','User status changed successfully!');
        } else {
            User::find($id)->update(['status' => 'Active']);
            return redirect()->back()->with('success','User status changed successfully!');
        }
    }

    public function getProduct()
    {
        // $roles =User::with(role)
        $products = Product::with(['Color', 'Brand', 'userName'])->get();
        // dd($products->toArray());
        return view('admin.product', compact('products'));
    }

    public function ChangeProductStatus($id)
    {
        $product = Product::find($id);
        // dd($product->status);
        if ($product->status == 'Active') {
            Product::find($id)->update(['status' => 'Inactive']);
            return redirect('/admin/getProduct')->with('success','Product status changed successfully!');
        } else {
            Product::find($id)->update(['status' => 'Active']);
            return redirect('/admin/getProduct')->with('success','Product status changed successfully!');
        }
    }

    public function changeCategoryStatus($id)
    {
        $category = Category::find($id);
        // dd($product->status);
        if ($category->status == 'Active') {
            Category::find($id)->update(['status' => 'Inactive']);
            return redirect()->back()->with('success','Category status changed successfully!');
        } else {
            Category::find($id)->update(['status' => 'Active']);
            return redirect()->back()->with('success','Category status changed successfully!');
        }
    }

    public function changeBrandStatus($id)
    {
        $brand = Brand::find($id);
        // dd($product->status);
        if ($brand->status == 'Active') {
            Brand::find($id)->update(['status' => 'Inactive']);
            return redirect()->back()->with('success','Brand status changed successfully!');
        } else {
            Brand::find($id)->update(['status' => 'Active']);
            return redirect()->back()->with('success','Brand status changed successfully!');
        }
    }
}
