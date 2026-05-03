<?php

declare(strict_types=1);

// namespace App\Http\Auth\Register;

use App\Http\Auth\Register\RegisterController;
use Tempest\Http\Session\FormSession;

use function Tempest\Container\get;
use function Tempest\Router\uri;

?>


<x-base title="Register">
    <h1 class="m-4 text-lg text-center">Register</h1>
    <div class="mr-4 ml-4">
        <?php $formAction = uri([RegisterController::class, 'register']); ?>

        <x-form :action="$formAction" :method="'POST'">
            <?php

            $emailOriginal = (string) (get(FormSession::class)->getOriginalValueFor('email') ?? '');
            $emailErrors = get(FormSession::class)->getErrorsFor('email');
            ?>

            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" :value="$emailOriginal" placeholder="sample@example.com" />
                <div :foreach="$emailErrors as $error">
                    <p>
                        {{$error->message()}}
                    </p>
                </div>
            </div>
            <?php

            $passwordOriginal = (string) (get(FormSession::class)->getOriginalValueFor('password') ?? '');
            $passwordErrors = get(FormSession::class)->getErrorsFor('password');
            ?>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" />
                <div :foreach="$passwordErrors as $error">
                    <p>
                        {{$error->message()}}
                    </p>
                </div>
            </div>

            <div class="flex justify-center mb-8">
                <x-submit class="bg-blue-500 text-white px-4 py-2 rounded" :label="'Create'" />
            </div>
        </x-form>
    </div>
</x-base>
