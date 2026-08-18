<?php

declare(strict_types=1);

namespace App\Models;

use Tempest\Database\IsDatabaseModel;
use Tempest\Database\PrimaryKey;
use Tempest\Database\Virtual;
use Tempest\DateTime\DateTime;

final class Posts
{
    use IsDatabaseModel;

    public PrimaryKey $id;
    public DateTime $created_at;
    public DateTime $updated_at;

    public function __construct(
        public int $user_id,
        public string $title,
        public string $content,
        public int $votes = 0,
    ) {
        $this->created_at = DateTime::now();
        $this->updated_at = DateTime::now();
    }

    #[Virtual]
    public int $comment_count {
        get => 0;
    }
}
