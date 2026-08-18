<?php

declare(strict_types=1);

use App\Models\User;
use Tempest\DateTime\DateTime;

use function Tempest\Support\str;

/**
 * @var User|null $author
 * @var DateTime $createdAt
 */

$author ??= User::getUnknownUser();

$avatarBackground = 'background: linear-gradient(135deg, #ff6b35, #e74c3c)';
$authorInitial = str($author?->username)->substr(0, 1);

?>
<div class="post-header">
  <div class="post-avatar" :style="$avatarBackground">{{ $authorInitial }}</div>
  <div class="post-meta">
    <span class="post-author">{{ $author->username }}</span>
    <span class="post-time">{{ $createdAt }}</span>
  </div>
</div>
