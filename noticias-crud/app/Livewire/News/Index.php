<?php

namespace App\Livewire\News;

use App\Models\News;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class Index extends Component
{
    use WithPagination;
    
    public $search = '';
    
    protected $listeners = ['newsCreated' => '$refresh', 'newsUpdated' => '$refresh'];
    
    public function updatingSearch()
    {
        $this->resetPage();
    }
    
    public function delete($id)
    {
        $news = News::find($id);
        
        if ($news) {
            // Deletar a imagem se existir
            if ($news->image && Storage::exists('public/' . $news->image)) {
                Storage::delete('public/' . $news->image);
            }
            
            $news->delete();
            session()->flash('message', 'Notícia excluída com sucesso!');
        }
    }
    
    public function render()
    {
        return view('livewire.news.index', [
            'newsList' => News::where('title', 'like', '%'.$this->search.'%')
                            ->orWhere('content', 'like', '%'.$this->search.'%')
                            ->orderBy('created_at', 'desc')
                            ->paginate(20)
        ]);
    }
}