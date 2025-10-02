<?php

declare(strict_types=1);

namespace App\Models;

use Tempest\Database\IsDatabaseModel;
use Tempest\DateTime\DateTime;

final class Comments
{
    use IsDatabaseModel;

    public DateTime $created_at;
    public DateTime $updated_at;

    public function __construct(
        public int $post_id,
        public int $user_id,
        public string $content,
    ) {
        $this->created_at = DateTime::now();
        $this->updated_at = DateTime::now();
    }
}
