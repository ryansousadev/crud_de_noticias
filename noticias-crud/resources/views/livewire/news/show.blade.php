<div>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">{{ $news->title }}</h2>
                        <div>
                            <a href="{{ route('news.edit', $news->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                                Editar
                            </a>
                            </a>
                            <a href="{{ route('news.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Voltar
                            </a>
                        </div>
                    </div>
                    
                    <div class="mb-4 text-sm text-gray-600">
                        Publicado em: {{ $news->created_at->format('d/m/Y H:i') }}
                    </div>
                    
                    @if ($news->image)
                        <div class="mb-6">
                            <img src="{{ Storage::url($news->image) }}" alt="{{ $news->title }}" class="max-w-full h-auto rounded-lg shadow-md">
                        </div>
                    @endif
                    
                    <div class="prose max-w-none">
                        <p>{{ $news->content }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>