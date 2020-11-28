<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use App\Category;
use App\Product;

class Products extends Component
{
    use WithFileUploads;
    public $products;
    public $categories;
    public $barcode, $name, $category, $url, $description, $specs, $features, $price, $amount, $discount, $discountType, $code, $color, $weight, $stock, $product_id;
    public $updateMode = false;
    public $createMode = false;
    public $discountMode = true;
    public $photos = [];
    public $prevPhotos = [];

    public function foo()
    {
        $this->createMode = true;
    }

    public function cancel()
    {
        $this->createMode = false;
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function discount()
    {
        $this->discountMode = true;
    }

    public function rv($index)
    {
        array_splice($this->photos, $index, 1);
    }

    public function remove($index)
    {
        array_splice($this->photos, $index, 1);
    }

    public function disable()
    {
        $this->discountMode = false;
        $this->amount = 0;
    }
    
    private function resetInputFields(){
        $this->reset(['barcode','name','url','category','description','specs','price','features','amount','discountType','code','color','stock','weight','photos']);
    }

    public function create(){
        $this->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'description' => 'required',
            'photos.*' => 'image|mimes:jpeg,png,jpg|max:1024',
        ]);

        $this->url = Str::slug($this->name);
        $slug_count = Product::where('url', $this->url)->count();
        if($slug_count > 0){
            $x = Date('ms')."-".rand(1000,10000);
            $this->url = $this->url.$x;
        }

        if($this->discountType == 0){
            $this->discount = $this->price * $this->amount / 100;
        }

        if($this->discountType == 1){
            $this->discount = $this->amount;
        }

        if(empty($this->stock)){
            $this->stock = 0;
        }

        foreach ($this->photos as $key => $photo) {
            $this->photos[$key] = $photo->store('images','public');
        }
        $this->photos = json_encode($this->photos);

        Product::create([
            'barcode' => $this->barcode,
            'name' => $this->name,
            'cat_id' => $this->category,
            'url' => $this->url,
            'description' => $this->description,
            'specification' => $this->specs,
            'features' => $this->features,
            'price' => $this->price,
            'discount' => $this->discount,
            'code' => $this->code,
            'color' => $this->color,
            'stock' => $this->stock,
            'image' => $this->photos,
            'is_featured' => 0
        ]);
        $this->createMode = false;
        $this->resetInputFields();
        session()->flash('message', 'Product Created Successfully.');
    }

    public function edit($id){
        $product = Product::findOrFail($id);
        $this->product_id = $id;
        $this->url = $product->url;
        $this->barcode = $product->barcode;
        $this->name = $product->name;
        $this->description = $product->description;
        $this->category = $product->cat_id;
        $this->specs = $product->specification;
        $this->price = $product->price;
        $this->features = $product->features;
        $this->discountType = 1;
        $this->amount = $product->discount;
        $this->code = $product->code;
        $this->color = $product->color;
        $this->stock = $product->stock;
        $this->prevPhotos = $product->image;
        $this->prevPhotos = json_decode($this->prevPhotos);

        $this->photos = [];
        // dd($this->photos);
        $this->updateMode = true;
    }

    public function update(){
        $this->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required',
            'description' => 'required',
            'photos.*' => 'image|mimes:jpeg,png,jpg|max:1024',
        ]);

        if($this->discountType == 0){
            $this->discount = $this->price * $this->amount / 100;
        }

        if($this->discountType == 1){
            $this->discount = $this->amount;
        }

        if(empty($this->stock)){
            $this->stock = 0;
        }

        if(!empty($this->photos)){
            foreach ($this->photos as $key => $photo) {
                $this->photos[$key] = $photo->store('images','public');
            }
            $myFiles = $this->prevPhotos;
            foreach($myFiles as $file) {
                $image_path = 'storage/'.$file;
                if (file_exists($image_path)) {
                    @unlink($image_path);
                }
            }
            $this->photos = json_encode($this->photos);
        }else{
            $this->photos = json_encode($this->prevPhotos);
        }
        

        $uproduct = Product::find($this->product_id);
        $uproduct->update([
            'name' => $this->name,
            'barcode' => $this->barcode,
            'cat_id' => $this->category,
            'url' => $this->url,
            'description' => $this->description,
            'specification' => $this->specs,
            'features' => $this->features,
            'price' => $this->price,
            'discount' => $this->discount,
            'code' => $this->code,
            'color' => $this->color,
            'stock' => $this->stock,
            'image' => $this->photos,
            'is_featured' => 0
        ]);

        $this->updateMode = false;
        $this->resetInputFields();
        $this->prevPhotos = [];
        session()->flash('message', 'Product Updated Successfully.');
    }

    public function delete($id){
        $product = Product::find($id);
        $images = $product->image;
        $myFiles = json_decode($images);
        foreach($myFiles as $file) {
            $image_path = 'storage/'.$file;
            if (file_exists($image_path)) {
                @unlink($image_path);
            }else{
                dd('No file found to delete!');
            }
        }
        $product->delete();
        $this->products = $this->products->except($id);
        $this->updateMode = false;
        $this->resetInputFields();
        session()->flash('message', 'Product deleted successfully!');
    }

    public function render()
    {
        $this->categories = Category::all();
        $this->products = Product::all();
        return view('livewire.products');
    }
}
