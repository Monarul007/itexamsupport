<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Exam;
use App\Certification;
use App\Vendor;

class Exams extends Component
{
    use WithFileUploads;

    public $exams;
    public $prevAttachment;
    public $name, $vendor, $certification, $code, $questions, $type, $price, $attachment, $features, $extra_features, $description, $status, $featured, $exam_id;
    public $vendors;
    public $certifications;
    public $updateMode = false;

    public function mount(){
        $this->vendors = Vendor::all();
        $this->certifications = Certification::all();
    }

    private function resetInputFields(){
        $this->name = '';
        $this->description = '';
        $this->type = '';
        $this->price = '';
        $this->status = '';
        $this->vendor = '';
        $this->certification = '';
        $this->code = '';
        $this->questions = '';
        $this->attachment = '';
        $this->prevAttachment = '';
        $this->features = '';
        $this->extra_features = '';
        $this->featured = '';
    }

    public function create(){
        $this->validate([
            'name' => 'required',
            'vendor' => 'required',
            'price' => 'required',
            'status' => 'required',
            'certification' => 'required',
            'code' => 'required',
            'attachment' => 'file|mimes:png,jpg,jpeg,pdf|max:5120',
            'questions' => 'required',
            'description' => 'required'
        ]);

        if(empty($this->featured)){
            $this->featured = 0;
        }
        
        $newExam = Exam::create([
            'exam_title' => $this->name,
            'vendor_id' => $this->vendor,
            'certification_id' => $this->certification,
            'exam_code' => $this->code,
            'price' => $this->price,
            'total_questions' => $this->questions,
            'attachment' => $this->attachment->store('images','public'),
            'features' => $this->features,
            'extra_features' => $this->extra_features,
            'description' => $this->description,
            'status' => $this->status,
            'featured' => $this->featured
        ]);

        $this->exams->prepend($newExam);
        $this->resetInputFields();

        session()->flash('message', 'Exam Created successfully!');
    }

    public function edit($id){
        $findExam = Exam::findOrFail($id);
        $this->exam_id = $id;
        $this->name = $findExam->exam_title;
        $this->vendor = $findExam->vendor_id;
        $this->certification = $findExam->certification_id;
        $this->code = $findExam->exam_code;
        $this->questions = $findExam->total_questions;
        $this->description = $findExam->description;
        $this->type = $findExam->product_type;
        $this->price = $findExam->price;
        $this->prevAttachment = $findExam->attachment;
        $this->features = $findExam->features;
        $this->extra_features = $findExam->extra_features;
        $this->status = $findExam->status;
        $this->featured = $findExam->featured;
        $this->attachment = '';
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
            'price' => 'required',
            'status' => 'required',
            'certification' => 'required',
            'code' => 'required',
            'questions' => 'required',
            'description' => 'required'
        ]);

        $exam = Exam::find($this->exam_id);
        if(empty($this->attachment)){
            // dd($this->prevAttachment);
            $exam->update([
                'attachment' => $this->prevAttachment
            ]);
        }else{
            // dd($this->attachment);
            $myFile = $this->prevAttachment;
            $image_path = 'storage/'.$myFile;
            if (file_exists($image_path)) {
                @unlink($image_path);
            }
            $exam->update([
                'attachment' => $this->attachment->store('images','public'),
            ]);
        }
        $exam->update([
            'exam_title' => $this->name,
            'vendor_id' => $this->vendor,
            'certification_id' => $this->certification,
            'exam_code' => $this->code,
            'total_questions' => $this->questions,
            'price' => $this->price,
            // 'attachment' => $this->attachment->store('images','public'),
            'features' => $this->features,
            'extra_features' => $this->extra_features,
            'description' => $this->description,
            'status' => $this->status,
            'featured' => $this->featured
        ]);
  
        $this->updateMode = false;
  
        session()->flash('message', 'Exam Updated Successfully.');
        $this->resetInputFields();
    }

    public function delete($eId){
        $exam = Exam::find($eId);
        $myFile = $exam->attachment;
        $image_path = 'storage/'.$myFile;
        if (file_exists($image_path)) {
            @unlink($image_path);
        }else{
            dd('No file found to delete!');
        }
        $exam->delete();
        $this->exams = $this->exams->except($eId);
        session()->flash('message', 'Exam Deleted successfully!');
    }

    public function render(){
        $this->exams = Exam::latest()->get();
        return view('livewire.exams');
    }

}
