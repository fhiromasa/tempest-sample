<?php

declare(strict_types=1);

namespace App\User;

use App\Models\User;
use App\User\Store\UserStoreRquest;
use Tempest\Http\Responses\Redirect;
use Tempest\Router\Delete;
use Tempest\Router\Get;
use Tempest\Router\Post;
use Tempest\Router\Put;
use Tempest\View\View;

use function Tempest\map;
use function Tempest\view;

/**
 * RESTful CRUD Controller
 *
 * Standard REST patterns:
 * GET    /users          - index()   - List all users
 * GET    /users/create   - create()  - Show create form
 * POST   /users          - store()   - Store new user
 * GET    /users/{id}     - show()    - Show specific user
 * GET    /users/{id}/edit - edit()   - Show edit form
 * PUT    /users/{id}     - update()  - Update specific user
 * DELETE /users/{id}     - destroy() - Delete specific user
 */
final readonly class UserController
{
    public function __construct()
    {
        // Constructor logic
    }

    /**
     * Display a listing of users
     */
    #[Get('/users')]
    public function index(): View
    {
        // Fetch all users from database
        return view('user-index.view.php');
    }

    /**
     * Show the form for creating a new user
     */
    #[Get('/users/create')]
    public function create(): View
    {
        return view('user-create.view.php');
    }

    /**
     * Store a newly created user
     */
    #[Post('/users')]
    public function store(UserStoreRquest $request): Redirect
    {
        new User($request->first_name, $request->last_name, $request->email)->save();
        // Validate and store user data
        return new Redirect('/users');
    }

    /**
     * Display the specified user
     */
    #[Get('/users/{id}')]
    public function show(string $id): View
    {
        // Fetch user by ID
        return view('user-show.view.php', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified user
     */
    #[Get('/users/{id}/edit')]
    public function edit(string $id): View
    {
        // Fetch user by ID for editing
        return view('user-edit.view.php', ['id' => $id]);
    }

    /**
     * Update the specified user
     */
    #[Put('/users/{id}')]
    public function update(string $id): Redirect
    {
        // Validate and update user data
        return new Redirect('/users');
    }

    /**
     * Remove the specified user
     */
    #[Delete('/users/{id}')]
    public function destroy(string $id): Redirect
    {
        // Delete user by ID
        return new Redirect('/users');
    }
}
