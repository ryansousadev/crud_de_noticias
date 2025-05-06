<?php

namespace App\Livewire\News;

use App\Models\News;
use Livewire\Component;

class Show extends Component
{
    public $news;
    
    public function mount($id)
    {
        $this->news = News::findOrFail($id);
    }
    
    public function render()
    {
        return view('livewire.news.show');
    }
}