<?php

declare(strict_types=1);

/**
 * @var string $name
 * @var string|null $label
 * @var string|null $id
 * @var string|null $type
 * @var string|null $default
 */

use Tempest\Http\Session\FormSession;

use function Tempest\Container\get;
use function Tempest\Support\str;

$session = get(FormSession::class);

$label ??= str($name)->title();
$id ??= $name;
$type ??= 'text';
$default ??= null;

$errors = $session->getErrorsFor($name);
$original = (string) ($session->getOriginalValueFor($name, $default) ?? '');
?>

<div>
    <label :for="$id">{{ $label }}</label>

    <textarea :if="$type === 'textarea'" :name="$name" :id="$id">{{ $original }}</textarea>
    <input :else :type="$type" :name="$name" :id="$id" :value="$original"/>

    <div :if="$errors !== []">
        <div :foreach="$errors as $error">
            {{ $error->message() }}
        </div>
    </div>
</div>
