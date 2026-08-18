<?php

declare(strict_types=1);

/**
 * @var string|null $title The webpage's title
 */
?>

<!doctype html>
<html lang="ja" class="h-dvh flex flex-col scroll-smooth">
<head>
  <title>{{ $title ?? 'PostHub - 投稿とコメント' }}</title>

  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <x-slot name="head"/>

  <x-vite-tags />
</head>
<body>
  <div id="app">
    <x-header/>
    <x-slot/>
    <x-footer/>
  </div>

  <x-slot name="scripts"/>
</body>
</html>
