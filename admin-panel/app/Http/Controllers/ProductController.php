<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Carbon\Carbon;
use Hekmatinasser\Verta\Facades\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{

    public function makeSlug($string){
        $slug = slugify($string);
        $count = Product::withTrashed()->whereRaw("slug ~ '^{$slug}(-[0-9]+)?$'")->count();
        $result = $count ? $slug . '-' . $count : $slug;
        return $result;
    }



    public function index(){
        $products = Product::paginate(5);
        return view('producs.index', compact('products'));
    }

    public function show(Product $product){

        $categories = Category::all();
        return view('producs.show', compact('product', 'categories'));
    }


    public function create(){
        $categories = Category::all();
        return view('producs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'primary_image' => 'required|image',
            'name' => 'required|string',
            'category_id' => 'required|integer',
            'status' => 'required|integer',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'sale_price' => 'nullable|integer',
            'date_on_sale_from' => 'nullable|date_format:Y/m/d H:i:s',
            'date_on_sale_to' => 'nullable|date_format:Y/m/d H:i:s',
            'description' => 'required',
            'images.*' => 'nullable|image'
        ]);

        $primaryImageName = Carbon::now()->microsecond . '-' . $request->primary_image->getClientOriginalName();
        $request->primary_image->storeAs('images/products', $primaryImageName, 'public');


        if($request->has('images') && $request->images !== null){
            $fileNameImages = [];
            foreach($request->images as $image){
                $fileNameImage = Carbon::now()->microsecond . '_' .$image->getClientOriginalName();
                $image->storeAs('images/products', $fileNameImage, 'public');
                array_push($fileNameImages, $fileNameImage);
            };
        };

        $slug = $this->makeSlug($request->name);


        try {
            DB::beginTransaction();

            $product = Product::create([
                'primary_image' => $primaryImageName,
                'name' => $request->name,
                'slug' => $slug,
                'category_id' => $request->category_id,
                'status' => $request->status,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'sale_price' => $request->sale_price !== null ? $request->sale_price : 0,
                'date_on_sale_from' =>$request->date_on_sale_from !== null ?  getMiladiDate($request->date_on_sale_from) : null,
                'date_on_sale_to' =>$request->date_on_sale_to !== null ? getMiladiDate($request->date_on_sale_to) : null,
                'description' => $request->description,
            ]);


            if($request->has('images') && $request->images !== null)
            {

                foreach($fileNameImages as $imageName)
                {

                    ProductImage::create([
                        'products_id' => $product->id,
                        'image' => $imageName
                    ]);

                };
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()], 500);
        }


        return redirect()->route('product.index')->with('success', 'محصول با موفقیت ایجاد شد');


    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index')->with('warning', 'با موفقیت محصول حذف شد');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('producs.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'primary_image' => 'nullable|image',
            'name' => 'required|string',
            'category_id' => 'required|integer',
            'status' => 'required|integer',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'sale_price' => 'nullable|integer',
            'date_on_sale_from' => 'nullable|date_format:Y/m/d H:i:s',
            'date_on_sale_to' => 'nullable|date_format:Y/m/d H:i:s',
            'description' => 'required',
            'images.*' => 'nullable|image'
        ]);

        if($request->has('primary_image') && $request->primary_image !== null)
        {

            Storage::delete('/images/produts/' .  $product->primary_image);
            $primaryImageName = Carbon::now()->microsecond . '-' . $request->primary_image->getClientOriginalName();
            $request->primary_image->storeAs('images/products', $primaryImageName, 'public');
        }else{
            $primaryImageName = $product->primary_image;
        }


        if($request->has('images') && $request->images !== null){
            $fileNameImages = [];
            foreach($request->images as $image){
                $fileNameImage = Carbon::now()->microsecond . '_' .$image->getClientOriginalName();
                $image->storeAs('images/products', $fileNameImage, 'public');
                array_push($fileNameImages, $fileNameImage);
            };
        };



        try {
            DB::beginTransaction();

            $product->update([
                'primary_image' => $primaryImageName,
                'name' => $request->name,
                'slug' => $request->name != $product->name ? $this->makeSlug($request->name) : $product->slug,
                'category_id' => $request->category_id,
                'status' => $request->status,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'sale_price' => $request->sale_price !== null ? $request->sale_price : 0,
                'date_on_sale_from' =>$request->date_on_sale_from !== null ?  getMiladiDate($request->date_on_sale_from) : null,
                'date_on_sale_to' =>$request->date_on_sale_to !== null ? getMiladiDate($request->date_on_sale_to) : null,
                'description' => $request->description,
            ]);


            if($request->has('images') && $request->images !== null)
            {
                foreach($product->images as $image)
                {
                    Storage::delete('/images/products/' . $image);
                    $image->delete();
                }

                foreach($fileNameImages as $imageName)
                {
                    ProductImage::create([
                        'products_id' => $product->id,
                        'image' => $imageName
                    ]);

                };
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()], 500);
        }


        return redirect()->route('product.index')->with('success', 'محصول با موفقیت ویرایش شد ');


    }
}
