<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use App\Models\Product;
use App\Models\Category;
use Orchid\Attachment\Models\Attachment;


class ViewsController extends Controller
{
    public function index()
    {
        $products = Product::all()->map(function ($product) {
            $image = Attachment::find($product->image);
            $product->image = $image ? $image->url() : null;
            return $product;
        });
        return view("index", [
            'products' => $products,
        ]);
    }

    public function register()
    {
        return view("pages.register");
    }

    public function login()
    {
        return view("pages.login");
    }

    public function basket()
    {
        return view("pages.basket", [
            'products' => Basket::all(),
        ]);
    }

    public function profile()
    {
        return view("pages.profile");
    }

    public function product(Product $product)
    {
        $image = Attachment::find($product->image);
        $product->image = $image ? $image->url() : null;
        return view("pages.product", [
            'product' => $product,
        ]);
    }

    public function categories(Category $categories)
    {
        $categories = Category::all()->map(function ($category) {
            return $category;
        });

        return view("pages.category", [
            'categories' => $categories,
        ]);
    }

    public function category(Category $category)
    {
        return view("pages.products_of_the_category", [
            'category' => $category,
        ]);
    }
}
