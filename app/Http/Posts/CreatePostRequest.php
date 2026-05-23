<?php

declare(strict_types=1);

namespace App\Http\Posts;

use Tempest\Http\IsRequest;
use Tempest\Http\Request;
use Tempest\Validation\Rules\HasLength;
use Tempest\Validation\Rules\IsNotEmptyString;

final class CreatePostRequest implements Request
{
    use IsRequest;

    #[IsNotEmptyString]
    public string $title;

    #[IsNotEmptyString]
    public string $content;


}
