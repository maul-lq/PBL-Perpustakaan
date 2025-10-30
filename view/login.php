<?php require __DIR__ . '/components/head.php'; ?>

<title>Login Page</title>

<!-- NOTE: Tailwind must already be included in the project (no CDN here) -->
<style>
    .page-bg {
        background-image: var(--bg-base-app);
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>
</head>

<body class="min-h-screen flex flex-col bg-white text-black font-inter page-bg">

    <!-- Header -->
    <header class="flex flex-col items-center pt-16 px-6">
        <!-- Logo circle -->
        <div
            role="img"
            aria-label="Website logo"
            class="w-56 h-56 bg-zinc-500 rounded-2xl flex items-center justify-center text-white text-xs"
            id="site-logo">
            Logo
        </div>

        <!-- Title & description (matching the Figma text elements) -->
        <h1 class="mt-6 text-xl font-semibold" id="page-title">Judul</h1>
        <p class="mt-2 text-sm text-gray-600" id="page-description">Deskripsi singkat halaman login</p>
    </header>

    <!-- Main content -->
    <main class="flex flex-col items-center mt-12 px-6 w-full">
        <div class="w-full max-w-md flex flex-col gap-6">
            <form action="#" method="post">
                <input type="text" name="username" id="username" placeholder="Username" class="w-full px-4 py-2 bg-stone-300 mt-20 py-4 hover:bg-zinc-500" required>
                <input type="password" name="password" id="password" placeholder="Password" class="w-full px-4 py-2 bg-stone-300 mt-2 py-4 hover:bg-zinc-500" required>
                <input type="checkbox" name="showpass" id="showpass" class=""><label for="showpass">Show Password</label>
                
                <input type="submit" class="w-full bg-stone-300 mt-20 py-4 hover:bg-zinc-500 transition" id="btn-login" name="action" value="login">
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="mt-auto text-center py-6 text-xs text-gray-500">
        <p>© 2025 Copyright</p>
    </footer>

</body>

<script src="<?= $asset("assets/js/skrip_sebelum_dashboard.js"); ?>" defer></script>

</html>