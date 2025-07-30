<?php
use App\User\UserController;
use function Tempest\uri;
?>

<x-base :title="'Create User'">
    <h1 class="m-4 text-lg text-center">Create User</h1>
    <div class="mr-4 ml-4">
        <x-form :action="uri([UserController::class, 'store'])" :method="'POST'">
            <x-input class="px-4 py-2 w-full"
                :label="'Name: '" :type="'text'" :name="'name'" :placeholder="'John Doe'" />

            <x-input class="px-4 py-2 w-full"
                :label="'Email: '" :type="'email'" :name="'email'" :placeholder="'sample@example.com'" />

            <div class="flex justify-center mb-8">
                <x-submit class="bg-blue-500 text-white px-4 py-2 rounded" :label="'Create'" />
            </div>
        </x-form>
    </div>
</x-base>
