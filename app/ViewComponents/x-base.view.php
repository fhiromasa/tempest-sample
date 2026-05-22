<?php

declare(strict_types=1);

/**
 * @var string|null $title The webpage's title
 */
?>

<!doctype html>
<html lang="en" class="h-dvh flex flex-col scroll-smooth">
<head>
    <title>{{ $title ?? 'Tempest' }}</title>

    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <x-slot name="head"/>

    <link rel="stylesheet" href="/assets/css/styles.css" />
</head>
<body>
    <div id="app">
        <x-header/>
        <x-slot/>
        <x-footer/>
    </div>

    <script type="module" src="/assets/js/main.js"></script>
    <x-slot name="scripts"/>
</body>
</html>
