<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    // View all categories
    public function view_category()
    {
        $data = Category::all();
        return view('admin.category', compact('data'));
    }

    // Add a new category
    public function add_category(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->save();

        session()->flash('success', 'Category added successfully');
        return redirect()->back();
    }

    // Delete a category
    public function delete_category($id)
    {
        $data = Category::find($id);

        if ($data) {
            $data->delete();
            session()->flash('success', 'Category deleted successfully');
        } else {
            session()->flash('error', 'Category not found');
        }

        return redirect()->back();
    }

    // View form to add a product
    public function add_product()
    {
        $categories = Category::all();
        return view('admin.add_product', compact('categories'));
    }

    // Upload a new product
    public function upload_product(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'price' => 'required|numeric',
            'category' => 'required|exists:categories,id',
            'qty' => 'required|integer|min:1',
        ]);

        $product = new Product();
        $product->title = $request->title;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('products', $imageName);
            $product->image = $imageName;
        }

        $product->price = $request->price;
        $product->category_id = $request->category; // Assuming a foreign key `category_id`
        $product->quantity = $request->qty;
        $product->save();

        session()->flash('success', 'Product added successfully');
        return redirect()->back();
    }

    // View all products
    public function view_product()
    {
        $products = Product::paginate(2); // Adjust pagination as needed
        return view('admin.view_product', compact('products'));
    }

    // Delete a product
    public function delete_product($id)
    {
        $data = Product::find($id);

        $image_path = public_path('products/'.$data->image);
        
        if(file_exists($image_path))
        {
            unlink($image_path);
        } 

        if ($data) {
            $data->delete();
            session()->flash('success', 'Product deleted successfully');
        } else {
            session()->flash('error', 'Product not found');
        }

        return redirect()->back();
    }

    //Update Products
    public function update_product($id)
    {

        $data = Product::find($id);

        $category = Category::all();

        return view('admin.update_page', compact('data', 'category'));

    }

    //Edit Products

    public function edit_product(Request $request,$id)
    {

        $data = Product::find($id);
        
        $data->title = $request->title;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;

        $image = $request->image;

        if($image)
        {

    $imagename = time().'.'.$image->getClientOriginalExtension();

    $request->image->move('products', $imagename);

    $data->image = $imagename;

        }

        $data->save();

        toastr()->timeOut(10000)->closeButton()->addSuccess('Product updated successfully!');

        return redirect('/view_product');

    }

    public function product_search(Request $request)
    {

        $search = $request->search;

        $products = Product::where('title', 'LIKE', '%'.$search.'%')->orWhere('category', 'LIKE', '%'.$search.'%')->paginate(3);

        return view('admin.view_product', compact('products'));

    }

}
