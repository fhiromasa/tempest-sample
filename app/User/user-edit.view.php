<x-base title="'Edit User'">
    <main class="w-screen h-screen overflow-hidden bg-sky-100/20">
        <form action="/users/{{ $user->id }}" method="PUT">
            <input type="text" name="name" placeholder="Name" value="{{ $user->name }}">
            <input type="email" name="email" placeholder="Email" value="{{ $user->email }}">
            <button type="submit">Create</button>
        </form>
    </main>
</x-base>
