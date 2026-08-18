<?php

declare(strict_types=1);

namespace App\Http\Posts\Comments;

use Tempest\Http\IsRequest;
use Tempest\Http\Request;
use Tempest\Validation\Rules\IsNotEmptyString;

class CreateCommentRequest implements Request
{
    use IsRequest;

    public function __construct(
        #[IsNotEmptyString]
        public string $content,
    ) {}
}
