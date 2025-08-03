<?php

declare(strict_types=1);

// namespace App\Auth\Register;

use App\Auth\Register\RegisterController;
use Tempest\Http\Session\Session;

use function Tempest\get;
use function Tempest\uri;

$formAction = uri([RegisterController::class, 'register']);

$emailOriginal = get(Session::class)->get(Session::ORIGINAL_VALUES)['email'] ?? null;
$emailErrors = get(Session::class)->get(Session::VALIDATION_ERRORS)['email'] ?? [];

$passwordOriginal = get(Session::class)->get(Session::ORIGINAL_VALUES)['password'] ?? null;
$passwordErrors = get(Session::class)->get(Session::VALIDATION_ERRORS)['password'] ?? [];
?>

<x-base title="Register">
    <h1 class="m-4 text-lg text-center">Register</h1>
    <div class="mr-4 ml-4">
        <x-form :action="$formAction" :method="'POST'">

            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" :value="$emailOriginal" placeholder="sample@example.com" />
                <div :foreach="$emailErrors as $error">
                    <p>
                        {{$error->message()}}
                    </p>
                </div>
            </div>

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
