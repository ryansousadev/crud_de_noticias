<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notícia - G1 Portal</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Fonte Roboto como no G1 -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
    @livewireStyles
</head>
<body class="bg-gray-100">
    <!-- Cabeçalho estilo G1 -->
    <header class="bg-red-700 py-4 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <a href="{{ route('news.index') }}" class="text-3xl font-bold text-white flex items-center">
                    <span class="inline-block bg-white text-red-700 rounded-sm px-2 py-1 mr-2">G1</span>
                    Portal de Notícias
                </a>
                <div>
                    <a href="{{ route('news.index') }}" class="bg-white hover:bg-gray-100 text-red-700 font-bold py-2 px-4 rounded-sm shadow">
                        Voltar
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main class="container mx-auto px-4 py-6">
        <livewire:news.show :id="$id" />
    </main>

    <footer class="bg-gray-800 text-white py-6">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <div class="flex items-center">
                        <span class="inline-block bg-white text-red-700 rounded-sm px-2 py-1 mr-2 font-bold">G1</span>
                        <span class="font-medium">Portal de Notícias</span>
                    </div>
                    <p class="text-sm mt-2">© 2024 Todos os direitos reservados</p>
                </div>
                <div class="text-sm">
                    Feito com Laravel, Livewire e TailwindCSS
                </div>
            </div>
        </div>
    </footer>
    
    @livewireScripts
</body>
</html>