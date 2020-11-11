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
    public $name, $vendor, $certification, $code, $questions, $type, $attachment, $features, $extra_features, $description, $status, $featured, $exam_id;
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
        $this->status = '';
        $this->vendor = '';
        $this->certification = '';
        $this->code = '';
        $this->questions = '';
        $this->attachment = '';
        $this->features = '';
        $this->extra_features = '';
        $this->featured = '';
    }

    public function create(){
        $this->validate([
            'name' => 'required',
            'vendor' => 'required',
            'type' => 'required',
            'status' => 'required',
            'certification' => 'required',
            'code' => 'required',
            'attachment' => 'file|max:1024',
            'questions' => 'required'
        ]);

        if(empty($this->featured)){
            $this->featured = 0;
        }
        
        $newExam = Exam::create([
            'exam_title' => $this->name,
            'vendor_id' => $this->vendor,
            'certification_id' => $this->certification,
            'exam_code' => $this->code,
            'total_questions' => $this->questions,
            'product_type' => $this->type,
            'attachment' => $this->attachment->store('photos'),
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
        $this->attachment = $findExam->attachment;
        $this->features = $findExam->features;
        $this->extra_features = $findExam->extra_features;
        $this->status = $findExam->status;
        $this->featured = $findExam->featured;
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
            'status' => 'required',
            'certification' => 'required',
            'code' => 'required',
            'questions' => 'required'
        ]);

        $exam = Exam::find($this->exam_id);
        $exam->update([
            'exam_title' => $this->name,
            'vendor_id' => $this->vendor,
            'certification_id' => $this->certification,
            'exam_code' => $this->code,
            'total_questions' => $this->questions,
            'product_type' => $this->type,
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
        $exam->delete();
        $this->exams = $this->exams->except($eId);

        session()->flash('message', 'Exam Deleted successfully!');
    }

    public function render(){
        $this->exams = Exam::latest()->get();
        return view('livewire.exams');
    }

}
