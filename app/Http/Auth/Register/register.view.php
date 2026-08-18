<?php

declare(strict_types=1);

// namespace App\Http\Auth\Register;

use App\Http\Auth\Register\RegisterController;

use function Tempest\Router\uri;

?>


<x-base title="Register">
  <h1 class="m-4 text-lg text-center">Register</h1>
  <div class="mr-4 ml-4">
    <?php $formAction = uri([RegisterController::class, 'register']); ?>

    <x-form :action="$formAction" :method="'POST'">
      <x-input :name="'email'" :label="'Email'" :type="'email'" :placeholder="'sample@example.com'" />
      <x-input :name="'password'" :label="'Password'" :type="'password'" />

      <div class="flex justify-center mb-8">
        <x-submit class="bg-blue-500 text-white px-4 py-2 rounded" :label="'Create'" />
      </div>
    </x-form>
  </div>
</x-base>
