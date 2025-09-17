<?php

declare(strict_types=1);

/** @var null|string $label The submit button's label */
?>

<input type="submit" :value="$label ?? 'Submit'">
