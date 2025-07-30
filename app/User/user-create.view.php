<?php

use App\User\UserController;
use Tempest\Http\Session\Session;
use Tempest\Validation\Rule;

use function Tempest\get;
use function Tempest\uri;

/** @var Tempest\Validation\Rule[]|null */
$nameErrors = get(Session::class)->get(Session::VALIDATION_ERRORS)['name'] ?? null;
$nameOriginal = get(Session::class)->get(Session::ORIGINAL_VALUES)['name'] ?? null;

$emailErrors = get(Session::class)->get(Session::VALIDATION_ERRORS)['email'] ?? null;
$emailOriginal = get(Session::class)->get(Session::ORIGINAL_VALUES)['email'] ?? null;
?>

<x-base :title="'Create User'">
    <h1 class="m-4 text-lg text-center">Create User</h1>
    <div class="mr-4 ml-4">
        <x-form :action="uri([UserController::class, 'store'])" :method="'POST'">

            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" :value="$nameOriginal" placeholder="John Doe" />
                <div :if="$nameErrors">
                    {{$nameErrors[0]?->message()}}
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
