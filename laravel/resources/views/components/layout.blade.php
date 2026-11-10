<!DOCTYPE html>
<html lang="en" data-theme="lofi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chirper - Home</title>
    <link rel="preconnect" href="<https://fonts.bunny.net>">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen flex flex-col bg-base-200 font-sans">
    <nav class="navbar bg-base-100">
        <div class="navbar-start">
            <a href="/" class="btn btn-ghost text-xl">🐦 Chirper</a>
        </div>  
        <div class="navbar-end gap-2">
            <a href="#" class="btn btn-ghost btn-sm">Sign In</a>
            <a href="#" class="btn btn-primary btn-sm">Sign Up</a>
        </div>
    </nav>

    <main class="flex-1 container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto">
            <div class="card bg-base-100 shadow mt-8">
                <div class="card-body">
                    <div>
                        <h1 class="text-3xl font-bold">Welcome to Chirper!</h1>
                        <p class="mt-4 text-base-content/60">This is your brand new Laravel application. Time to make it
                            sing (or chirp)!</p>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer footer-center p-5 bg-base-300 text-base-content text-xs">
        <div>
            <p>© 2025 Chirper - Built with Laravel and ❤️</p>
        </div>
    </footer>
</body>

</html>