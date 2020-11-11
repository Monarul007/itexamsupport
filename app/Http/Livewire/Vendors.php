<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Vendor;

class Vendors extends Component
{
    public $vendors;

    public $VendorName, $VendorDesc, $VendorType, $VendorID;
    public $updateMode = false;

    // public function mount(){
    //     $allvendors = Vendor::latest()->get();
    //     $this->vendors = $allvendors;
    // }

    public function create(){
        $this->validate([
            'VendorName' => 'required',
            'VendorDesc' => 'required|min:10',
            'VendorType' => 'required'
        ]);
        
        $newVendor = Vendor::create([
            'name' => $this->VendorName, 
            'description' => $this->VendorDesc,
            'type' => $this->VendorType
        ]);

        $this->vendors->prepend($newVendor);
        $this->resetInputFields();

        session()->flash('message', 'Vendor Added successfully!');
    }

    private function resetInputFields(){
        $this->VendorName = '';
        $this->VendorDesc = '';
        $this->VendorType = '';
    }

    public function delete($id){
        $vendor = Vendor::find($id);
        $vendor->delete();
        $this->vendors = $this->vendors->except($id);
        session()->flash('message', 'Vendor Deleted successfully!');
    }

    public function edit($id){
        $findVendor = Vendor::findOrFail($id);
        $this->VendorID = $id;
        $this->VendorName = $findVendor->name;
        $this->VendorDesc = $findVendor->description;
        $this->VendorType = $findVendor->type;
        $this->updateMode = true;
    }

    public function cancel(){
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update(){
        $this->validate([
            'VendorName' => 'required',
            'VendorDesc' => 'required|min:10',
            'VendorType' => 'required'
        ]);

        $post = Vendor::find($this->VendorID);
        $post->update([
            'name' => $this->VendorName,
            'description' => $this->VendorDesc,
            'type' => $this->VendorType
        ]);
  
        $this->updateMode = false;
  
        session()->flash('message', 'Vendor Updated Successfully.');
        $this->resetInputFields();
    }

    public function render(){
        $this->vendors = Vendor::latest()->get();
        return view('livewire.vendors');
    }
}
