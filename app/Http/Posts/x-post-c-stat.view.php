<?php

declare(strict_types=1);

/**
 * @var int|null $votes
 * @var int|null $commentCount
 */

?>

<div class="post-stats">
  <div class="stat">
    <x-icon name="material-symbols:arrow-shape-up" />
    <span class="stat-votes">{{ $votes }}</span>
  </div>
  <div class="stat">
    <x-icon name="material-symbols:comment" />
    <span>{{ $commentCount }} コメント</span>
  </div>
</div>
