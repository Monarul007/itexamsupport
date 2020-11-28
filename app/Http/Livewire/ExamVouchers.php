<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Vouchers;
use App\Certification;
use App\Vendor;
use App\Exam;

class ExamVouchers extends Component
{
    use WithFileUploads;
    public $exams;
    public $prevAttachment;
    public $name, $vendor, $certification, $exam, $type, $price, $attachment, $description, $status, $featured, $voucher_id;
    public $vouchers;
    public $vendors;
    public $certifications;
    public $updateMode = false;
    public function render()
    {
        $this->vendors = Vendor::all();
        $this->certifications = Certification::all();
        $this->vouchers = Vouchers::all();
        return view('livewire.exam-vouchers');
    }
}
