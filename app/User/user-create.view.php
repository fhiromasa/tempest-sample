<?php

use App\User\UserController;
use Tempest\Http\Session\Session;
use Tempest\Validation\Rule;

use function Tempest\get;
use function Tempest\uri;

/** @var Tempest\Validation\Rule[]|null */
$firstnameErrors = get(Session::class)->get(Session::VALIDATION_ERRORS)['first_name'] ?? null;
$firstnameOriginal = get(Session::class)->get(Session::ORIGINAL_VALUES)['first_name'] ?? null;

$lastnameErrors = get(Session::class)->get(Session::VALIDATION_ERRORS)['last_name'] ?? null;
$lastnameOriginal = get(Session::class)->get(Session::ORIGINAL_VALUES)['last_name'] ?? null;

$emailErrors = get(Session::class)->get(Session::VALIDATION_ERRORS)['email'] ?? null;
$emailOriginal = get(Session::class)->get(Session::ORIGINAL_VALUES)['email'] ?? null;
?>

<x-base :title="'Create User'">
    <h1 class="m-4 text-lg text-center">Create User</h1>
    <div class="mr-4 ml-4">
        <x-form :action="uri([UserController::class, 'store'])" :method="'POST'">

            <div>
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" id="first_name" :value="$firstnameOriginal" placeholder="John" />
                <div :if="$firstnameErrors">
                    {{$firstnameErrors[0]?->message()}}
                </div>
            </div>

            <div>
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" id="last_name" :value="$lastnameOriginal" placeholder="Doe" />
                <div :if="$lastnameErrors">
                    {{$lastnameErrors[0]?->message()}}
                </div>
            </div>

            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" :value="$emailOriginal" placeholder="sample@example.com" />
                <div :if="$emailErrors">
                    {{$emailErrors[0]?->message()}}
                </div>
            </div>

            <div class="flex justify-center mb-8">
                <x-submit class="bg-blue-500 text-white px-4 py-2 rounded" :label="'Create'" />
            </div>
        </x-form>
    </div>
</x-base>
