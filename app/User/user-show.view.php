<x-base :title="'Show User'">
    <main class="w-screen h-screen overflow-hidden bg-sky-100/20">
        <div class="flex flex-col items-center justify-center h-full">
            <h1 class="text-3xl font-bold mb-4">User Details</h1>
            <div class="bg-white rounded-lg shadow-md p-6">
                <p class="text-lg font-medium mb-2">Name: {{ $user->name }}</p>
                <p class="text-lg font-medium mb-2">Email: {{ $user->email }}</p>
                <p class="text-lg font-medium mb-2">Created At: {{ $user->created_at->format('Y-m-d H:i:s') }}</p>
                <p class="text-lg font-medium mb-2">Updated At: {{ $user->updated_at->format('Y-m-d H:i:s') }}</p>
            </div>
        </div>
    </main>
</x-base>
