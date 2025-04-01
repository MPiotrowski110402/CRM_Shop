<!-- resources/views/layout.blade.php -->
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System zarządzania sklepem</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        @include('components.sidebar')
        
        <!-- Główna zawartość -->
        <div class="flex-1 p-6">
            <header class="bg-white shadow p-4 text-2xl font-bold">System zarządzania sklepem</header>
            <main class="mt-4">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
