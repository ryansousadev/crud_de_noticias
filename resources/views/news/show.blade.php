<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Notícia</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <livewire:news.show :id="$id" />
    </div>
    @livewireScripts
</body>
</html> 