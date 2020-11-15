<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Vendor;

class Vendorfilter extends Component
{
    public $vendors;
    public $vendor;
    public $vv;
    public $singleMode = false;

    public function render()
    {
        $this->vendors = Vendor::get();
        return view('livewire.vendorfilter');
    }

    public function results(){
        $this->validate([
            'vendor' => 'required'
        ]);
        $this->singleMode = true;
        $vid = $this->vendor;
        $this->vv = Vendor::where('id', $vid)->first();
    }

    protected $messages = [
        'vendor.required' => 'Please select a vendor to filter result!'
    ];
}
