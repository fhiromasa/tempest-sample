<?php

declare(strict_types=1);

// namespace App\View\Layouts;

?>

<html lang="en">
<head>
    <title :if="isset($title)">{{ $title }} | Tempest</title>
    <title :else>Tempest</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-touch-icon.png"/>
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png"/>
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png"/>
    <link rel="manifest" href="/favicon/site.webmanifest"/>

    <script src="https://cdn.tailwindcss.com"></script>
    <x-slot name="styles"/>
</head>
<body class="bg-gray-900 text-gray-100">
    <x-header />
    <main class="w-screen h-screen">
        <x-slot />
    </main>
</body>
</html>
