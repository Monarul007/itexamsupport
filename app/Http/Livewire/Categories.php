<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Category;
use Livewire\WithFileUploads;

class Categories extends Component
{
    use WithFileUploads;
    public $categories;
    public $name, $url, $parent, $desc, $thumbnail, $cat_id;
    public $updateMode = false;

    private function resetInputFields(){
        $this->name = '';
        $this->url = '';
        $this->parent = '';
        $this->desc = '';
        $this->cat_id = '';
    }

    public function create(){
        $this->validate([
            'name' => 'required',
            'parent' => 'required'
        ]);

        $this->url = Str::slug($this->name);
        $slug_count = Category::where('url', $this->url)->count();
        if($slug_count > 0){
            $x = Date('ms')."-".rand(1000,10000);
            $this->url = $this->url.$x;
        }

        Category::create([
            'name' => $this->name,
            'parent_id' => $this->parent,
            'description' => $this->desc,
            'url' => $this->url,
            'status' => 1
        ]);

        session()->flash('message', 'Category Created Successfully.');
        $this->resetInputFields();
    }

    public function edit($id){
        $category = Category::findOrFail($id);
        $this->cat_id = $id;
        $this->url = $category->url;
        $this->parent = $category->parent_id;
        $this->name = $category->name;
        $this->desc = $category->description;
        $this->thumbnail = $category->image;
        $this->status = $category->status;
        $this->updateMode = true;
    }

    public function cancel(){
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update(){
        $ucategory = Category::find($this->cat_id);
        $ucategory->update([
            'name' => $this->name,
            'parent_id' => $this->parent,
            'description' => $this->desc,
            'url' => $this->url,
            'status' => 1
        ]);
        $this->resetInputFields();
        $this->updateMode = false;
        session()->flash('message', 'Category Updated Successfully.');
    }

    public function remove($id){
        $cat = Category::find($id);
        $cat->delete();
        $this->categories = $this->categories->except($id);
        $this->updateMode = false;
        $this->resetInputFields();
        session()->flash('message', 'Category Deleted successfully!');
    }

    public function render()
    {
        $this->categories = Category::latest()->get();
        return view('livewire.categories');
    }
}
