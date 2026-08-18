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
use Tempest\Validation\Validator;

use function Tempest\Container\get;
use function Tempest\Support\str;

$formSession = get(FormSession::class);
$validator = get(Validator::class);

$label ??= str($name)->title();
$id ??= $name;
$type ??= 'text';
$default ??= null;

$errors = $formSession->getErrorsFor($name);
$original = $formSession->getOriginalValueFor($name, $default);
?>

<div class="form-group">
  <label :for="$id" class="form-label">{{ $label }}</label>

  <textarea :if="$type === 'textarea'" :name="$name" :id="$id" class="form-textarea">{{ $original }}</textarea>
  <input :else :type="$type" :name="$name" :id="$id" class="form-input" :value="$original"/>

  <ul :if="$errors !== []">
    <li :foreach="$errors as $error">
      {{ $validator->getErrorMessage($error) }}
    </li>
  </ul>
</div>
