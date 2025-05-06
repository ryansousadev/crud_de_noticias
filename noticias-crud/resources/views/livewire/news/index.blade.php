<div>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold">Notícias</h2>
                        <a href="{{ route('news.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Nova Notícia
                        </a>
                    </div>
                    
                    @if (session()->has('message'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('message') }}</span>
                        </div>
                    @endif
                    
                    <div class="mb-4">
                        <input wire:model.live="search" type="text" placeholder="Buscar notícias..." class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    
                    <!-- Grid de cards responsivo -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse ($newsList as $news)
                            <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200 hover:shadow-lg transition-shadow duration-300">
                                @if ($news->image)
                                    <img src="{{ Storage::url($news->image) }}" alt="{{ $news->title }}" class="w-full h-48 object-cover">
                                @else
                                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                        <span class="text-gray-500">Sem imagem</span>
                                    </div>
                                @endif
                                
                                <div class="p-4">
                                    <h3 class="text-xl font-semibold mb-2 truncate">{{ $news->title }}</h3>
                                    
                                    <p class="text-gray-600 text-sm mb-3 line-clamp-2">
                                        {{ \Illuminate\Support\Str::limit($news->content, 100) }}
                                    </p>
                                    
                                    <div class="flex items-center text-sm text-gray-500 mb-4">
                                        <svg class="h-4 w-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                        </svg>
                                        <span>{{ $news->created_at->format('d/m/Y H:i') }}</span>
                                    </div>
                                    
                                    <div class="flex justify-between">
                                        <div>
                                            <a href="{{ route('news.show', $news->id) }}" class="text-blue-600 hover:text-blue-900 mr-2">Ver</a>
                                            <a href="{{ route('news.edit', $news->id) }}" class="text-green-600 hover:text-green-900 mr-2">Editar</a>
                                        </div>
                                        <button 
                                            wire:click="delete({{ $news->id }})" 
                                            onclick="return confirm('Tem certeza que deseja excluir esta notícia?')" 
                                            class="text-red-600 hover:text-red-900">
                                            Excluir
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-1 md:col-span-2 lg:col-span-3 p-4 border rounded-lg bg-gray-50 text-center">
                                Nenhuma notícia encontrada.
                            </div>
                        @endforelse
                    </div>
                    
                    <div class="mt-6">
                        {{ $newsList->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>