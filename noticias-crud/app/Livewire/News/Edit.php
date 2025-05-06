<?php

namespace App\Livewire\News;

use App\Models\News;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;
    
    public $newsId;
    public $title;
    public $content;
    public $image;
    public $newImage;
    public $oldImage;
    
    protected $rules = [
        'title' => 'required|max:100',
        'content' => 'required|max:300',
        'newImage' => 'nullable|image|max:1024', // max 1MB
    ];
    
    public function mount($id)
    {
        $news = News::findOrFail($id);
        $this->newsId = $news->id;
        $this->title = $news->title;
        $this->content = $news->content;
        $this->oldImage = $news->image;
    }
    
    public function update()
    {
        $this->validate();
        
        $news = News::findOrFail($this->newsId);
        
        $imagePath = $this->oldImage;
        
        if ($this->newImage) {
            // Deletar imagem antiga se existir
            if ($news->image && Storage::exists('public/' . $news->image)) {
                Storage::delete('public/' . $news->image);
            }
            
            // Salvar nova imagem
            $imagePath = $this->newImage->store('news', 'public');
        }
        
        $news->update([
            'title' => $this->title,
            'content' => $this->content,
            'image' => $imagePath,
        ]);
        
        session()->flash('message', 'Notícia atualizada com sucesso!');
        $this->dispatch('newsUpdated');
        
        return redirect()->route('news.index');
    }
    
    public function render()
    {
        return view('livewire.news.edit');
    }
}