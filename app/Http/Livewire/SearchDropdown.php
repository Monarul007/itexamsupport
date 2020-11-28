<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Exam;

class SearchDropdown extends Component
{
    public $searchTerm;
    public $results;
    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        if(strlen($this->searchTerm)){
            $this->results = Exam::where('exam_code', 'like', $searchTerm)->orWhere('exam_title', 'like', $searchTerm)->take(5)->get();
        }
        return view('livewire.search-dropdown');
    }
}
