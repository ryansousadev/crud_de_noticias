<div>
    <!-- Mensagem de feedback -->
    @if (session()->has('message'))
        <div class="bg-green-100 border-l-4 border-green-600 text-green-700 p-4 mb-4 rounded-r shadow-sm" role="alert">
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
    @endif
    
    <!-- Barra de busca -->
    <div class="mb-6">
        <div class="relative">
            <input wire:model.live="search" type="text" placeholder="Buscar notícias..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-2 focus:ring-red-500 focus:border-red-500">
            <div class="absolute left-3 top-2.5">
                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </div>
        </div>
    </div>
    
    <!-- Linha separadora -->
    <div class="mb-6 border-b-2 border-red-700"></div>
    
    <!-- Notícia principal e Grid de notícias -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        @if($newsList->isNotEmpty())
            <!-- Notícia destaque (apenas na primeira página) -->
            @if($newsList->currentPage() == 1)
                <div class="lg:col-span-2">
                    @php $featuredNews = $newsList->first(); @endphp
                    <div class="bg-white rounded shadow-sm overflow-hidden border-b-2 border-red-700" style="height:auto; min-height:400px; max-height:450px;">
                        @if ($featuredNews->image)
                            <img src="{{ Storage::url($featuredNews->image) }}" alt="{{ $featuredNews->title }}" class="w-full h-64 object-cover">
                        @else
                            <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-500">Sem imagem</span>
                            </div>
                        @endif
                        
                        <div class="p-4">
                            <h2 class="text-2xl font-bold mb-2 text-gray-800 leading-tight">{{ $featuredNews->title }}</h2>
                            
                            <p class="text-gray-600 text-base mb-4 line-clamp-3">
                                {{ \Illuminate\Support\Str::limit($featuredNews->content, 150) }}
                            </p>
                            
                            <div class="flex items-center text-sm text-gray-500 mb-4">
                                <time datetime="{{ $featuredNews->created_at->format('Y-m-d H:i') }}">
                                    {{ $featuredNews->created_at->format('d/m/Y H:i') }}
                                </time>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <div>
                                    <a href="{{ route('news.show', $featuredNews->id) }}" class="inline-block bg-red-700 hover:bg-red-800 text-white px-4 py-1 rounded-sm">
                                        Ler mais
                                    </a>
                                </div>
                                <div>
                                    <a href="{{ route('news.edit', $featuredNews->id) }}" class="text-blue-600 hover:text-blue-900 mr-3">Editar</a>
                                    <button 
                                        x-data="{}"
                                        x-on:click="$dispatch('open-modal', { id: {{ $featuredNews->id }}, title: '{{ $featuredNews->title }}' })"
                                        class="text-red-600 hover:text-red-900">
                                        Excluir
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            
            <!-- Grid de notícias menores -->
            <div class="{{ $newsList->currentPage() == 1 ? 'lg:col-span-1' : 'lg:col-span-3' }}">
                <div class="grid grid-cols-1 {{ $newsList->currentPage() == 1 ? '' : 'md:grid-cols-2 lg:grid-cols-3' }} gap-4">
                    @foreach ($newsList as $index => $news)
                        @if($newsList->currentPage() == 1 && $index == 0)
                            <!-- Pular a primeira notícia (já mostrada como destaque) -->
                            @continue
                        @endif
                        <div class="bg-white rounded shadow-sm overflow-hidden border-b-2 border-red-700 h-full hover:shadow-md transition-shadow duration-300">
                            @if ($news->image)
                                <img src="{{ Storage::url($news->image) }}" alt="{{ $news->title }}" class="w-full h-40 object-cover">
                            @else
                                <div class="w-full h-40 bg-gray-200 flex items-center justify-center">
                                    <span class="text-gray-500">Sem imagem</span>
                                </div>
                            @endif
                            
                            <div class="p-3">
                                <h3 class="text-lg font-bold mb-2 leading-tight text-gray-800">{{ $news->title }}</h3>
                                
                                <p class="text-gray-600 text-sm mb-3 line-clamp-2">
                                    {{ \Illuminate\Support\Str::limit($news->content, 80) }}
                                </p>
                                
                                <div class="flex justify-between items-center">
                                    <time datetime="{{ $news->created_at->format('Y-m-d H:i') }}" class="text-xs text-gray-500">
                                        {{ $news->created_at->format('d/m/Y H:i') }}
                                    </time>
                                    <div class="flex space-x-2">
                                        <a href="{{ route('news.show', $news->id) }}" class="text-blue-600 hover:text-blue-900 text-sm">Ver</a>
                                        <a href="{{ route('news.edit', $news->id) }}" class="text-green-600 hover:text-green-900 text-sm">Editar</a>
                                        <button 
                                            x-data="{}"
                                            x-on:click="$dispatch('open-modal', { id: {{ $news->id }}, title: '{{ $news->title }}' })"
                                            class="text-red-600 hover:text-red-900 text-sm">
                                            Excluir
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="col-span-3 p-6 border rounded-lg bg-white text-center">
                <p class="text-gray-500 text-lg">Nenhuma notícia encontrada.</p>
                <a href="{{ route('news.create') }}" class="inline-block mt-4 bg-red-700 hover:bg-red-800 text-white font-medium py-2 px-4 rounded-sm">
                    Criar primeira notícia
                </a>
            </div>
        @endif
    </div>
    
    <!-- Paginação -->
    <div class="mt-6">
        {{ $newsList->links() }}
    </div>
    
    <!-- Modal de Confirmação de Exclusão -->
    <div
        x-data="{ 
            show: false,
            newsId: null,
            newsTitle: ''
        }"
        x-on:open-modal.window="show = true; newsId = $event.detail.id; newsTitle = $event.detail.title"
        x-show="show"
        style="display: none"
        class="fixed inset-0 overflow-y-auto z-50 flex items-center justify-center"
    >
        <!-- Overlay de fundo -->
        <div class="fixed inset-0 bg-black opacity-50" x-on:click="show = false"></div>
        
        <!-- Modal -->
        <div class="relative bg-white rounded-lg shadow-xl max-w-md w-full p-6 z-10">
            <div class="flex flex-col items-center">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                    <svg class="h-6 w-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <h3 class="text-xl font-medium text-center mb-2">Confirmação de exclusão</h3>
                <p class="text-gray-500 text-center mb-6">
                    Tem certeza que deseja excluir a notícia "<span x-text="newsTitle" class="font-medium"></span>"?
                </p>
                <div class="flex justify-center space-x-4 w-full">
                    <button
                        x-on:click="show = false"
                        class="py-2 px-4 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded-sm focus:outline-none">
                        Cancelar
                    </button>
                    <button
                        x-on:click="$wire.delete(newsId, true); show = false"
                        class="py-2 px-4 bg-red-700 hover:bg-red-800 text-white rounded-sm focus:outline-none">
                        Excluir
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>