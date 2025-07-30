<x-base :title="'Create User'">
    <main class="w-screen h-screen overflow-hidden bg-sky-100/20">
        <form action="/users" method="POST">
            <input type="text" name="name" placeholder="Name">
            <input type="email" name="email" placeholder="Email">
            <button type="submit">Create</button>
        </form>
    </main>
</x-base>
