<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Certification;
use App\Vendor;

class Certifications extends Component
{
    public $certifications;
    public $name, $description, $type, $status, $vendor, $certification_id;
    public $updateMode = false;
    public $vendors;

    public function mount(){
        $this->vendors = Vendor::all();
    }

    public function render(){
        $this->certifications = Certification::latest()->get();
        return view('livewire.certifications');
    }

    private function resetInputFields(){
        $this->name = '';
        $this->description = '';
        $this->type = '';
        $this->status = '';
        $this->vendor = '';
    }

    public function create(){
        $this->validate([
            'name' => 'required',
            'vendor' => 'required',
            'type' => 'required',
            'status' => 'required'
        ]);
        
        $newCertification = Certification::create([
            'title' => $this->name,
            'vendor_id' => $this->vendor,
            'description' => $this->description,
            'type' => $this->type,
            'status' => $this->status,
        ]);

        $this->certifications->prepend($newCertification);
        $this->resetInputFields();

        session()->flash('message', 'Certification Created successfully!');
    }

    public function edit($id){
        $findCertification = Certification::findOrFail($id);
        $this->certification_id = $id;
        $this->name = $findCertification->title;
        $this->vendor = $findCertification->vendor_id;
        $this->description = $findCertification->description;
        $this->type = $findCertification->type;
        $this->status = $findCertification->status;
        $this->updateMode = true;
    }

    public function cancel(){
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update(){
        $this->validate([
            'name' => 'required',
            'vendor' => 'required',
            'type' => 'required',
            'status' => 'required'
        ]);

        $post = Certification::find($this->certification_id);
        $post->update([
            'title' => $this->name,
            'vendor_id' => $this->vendor,
            'description' => $this->description,
            'type' => $this->type,
            'status' => $this->status
        ]);
  
        $this->updateMode = false;
  
        session()->flash('message', 'Certification Updated Successfully.');
        $this->resetInputFields();
    }

    public function delete($vId){
        $certification = Certification::find($vId);
        $certification->delete();
        $this->certifications = $this->certifications->except($vId);

        session()->flash('message', 'Certification Deleted successfully!');
    }
}
