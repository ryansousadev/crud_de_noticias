<div>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-6">Editar Notícia</h2>
                    
                    @if (session()->has('message'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                            <span class="block sm:inline">{{ session('message') }}</span>
                        </div>
                    @endif
                    
                    <form wire:submit.prevent="update">
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Título:</label>
                            <input wire:model="title" type="text" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Conteúdo:</label>
                            <textarea wire:model="content" id="content" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                            @error('content') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        
                        <div class="mb-4">
                            <label for="newImage" class="block text-gray-700 text-sm font-bold mb-2">Imagem:</label>
                            <input wire:model="newImage" type="file" id="newImage" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('newImage') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                            
                            @if ($newImage)
                                <div class="mt-2">
                                    <img src="{{ $newImage->temporaryUrl() }}" class="h-20 w-20 object-cover rounded">
                                </div>
                            @elseif ($oldImage)
                                <div class="mt-2">
                                    <img src="{{ Storage::url($oldImage) }}" class="h-20 w-20 object-cover rounded">
                                </div>
                            @endif
                        </div>
                        
                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Atualizar
                            </button>
                            <a href="{{ route('news.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>