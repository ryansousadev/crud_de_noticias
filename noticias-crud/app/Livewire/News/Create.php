<?php

namespace App\Livewire\News;

use App\Models\News;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    
    public $title;
    public $content;
    public $image;
    
    protected $rules = [
        'title' => 'required|max:100',
        'content' => 'required|max:300',
        'image' => 'nullable|image|max:1024', // max 1MB
    ];
    
    public function save()
    {
        $this->validate();
        
        $imagePath = null;
        if ($this->image) {
            $imagePath = $this->image->store('news', 'public');
        }
        
        News::create([
            'title' => $this->title,
            'content' => $this->content,
            'image' => $imagePath,
        ]);
        
        $this->reset(['title', 'content', 'image']);
        
        session()->flash('message', 'Notícia criada com sucesso!');
        $this->dispatch('newsCreated');
        
        return redirect()->route('news.index');
    }
    
    public function render()
    {
        return view('livewire.news.create');
    }
}