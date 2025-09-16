<?php

declare(strict_types=1);

/**
 * @var string|null $action
 * @var string|Method|null $method
 * @var string|null $enctype
 */

use Tempest\Http\Method;

$action ??= null;
$method ??= Method::POST;

if ($method instanceof Method) {
    $method = $method->value;
}
?>

<form :action="$action" :method="$method" :enctype="$enctype">
    <x-csrf-token />

    <x-slot />
</form>
