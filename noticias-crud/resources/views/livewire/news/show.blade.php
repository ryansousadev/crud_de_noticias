<div>
    <div class="bg-white shadow-sm rounded-sm overflow-hidden">
        <!-- Cabeçalho da notícia -->
        <div class="border-b-2 border-red-700 p-6">
            <h1 class="text-3xl font-bold mb-4 text-gray-900">{{ $news->title }}</h1>
            
            <div class="flex items-center text-sm text-gray-600 mb-2">
                <svg class="h-4 w-4 mr-1 text-red-700" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                </svg>
                <time datetime="{{ $news->created_at->format('Y-m-d H:i') }}">
                    Publicado em: {{ $news->created_at->format('d/m/Y') }} às {{ $news->created_at->format('H:i') }}
                </time>
                
                @if($news->created_at != $news->updated_at)
                <span class="mx-2">•</span>
                <time datetime="{{ $news->updated_at->format('Y-m-d H:i') }}">
                    Atualizado em: {{ $news->updated_at->format('d/m/Y') }} às {{ $news->updated_at->format('H:i') }}
                </time>
                @endif
            </div>
            
            <div class="flex justify-end mt-4">
                <a href="{{ route('news.edit', $news->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-sm mr-2">
                    Editar
                </a>
                <a href="{{ route('news.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded-sm">
                    Voltar
                </a>
            </div>
        </div>
        
        <!-- Conteúdo da notícia -->
        <div class="p-6">
            <!-- Imagem da notícia -->
            @if ($news->image)
                <div class="mb-8 flex justify-center">
                    <figure>
                        <img src="{{ Storage::url($news->image) }}" alt="{{ $news->title }}" class="max-w-full h-auto rounded shadow-md" style="max-height: 450px; max-width: 800px; object-fit: contain;">
                        <figcaption class="text-center text-sm text-gray-500 mt-2">Imagem: {{ $news->title }}</figcaption>
                    </figure>
                </div>
            @endif
            
            <!-- Texto da notícia -->
            <div class="prose max-w-none text-lg leading-relaxed">
                <p class="mb-6">{{ $news->content }}</p>
            </div>
            
            <!-- Compartilhamento (opcional) -->
            <div class="mt-8 pt-6 border-t border-gray-200">
                <h4 class="text-sm font-semibold uppercase text-gray-600 mb-2">Compartilhar</h4>
                <div class="flex space-x-4">
                    <a href="#" class="text-blue-700 hover:text-blue-900">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.5 3.44 9.5 5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-blue-400 hover:text-blue-600">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723 10.1 10.1 0 01-3.127 1.195 4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.937 4.937 0 004.604 3.417 9.868 9.868 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.054 0 13.999-7.496 13.999-13.986 0-.209 0-.42-.015-.63a9.936 9.936 0 002.46-2.548l-.047-.02z"/>
                        </svg>
                    </a>
                    <a href="#" class="text-green-600 hover:text-green-800">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>