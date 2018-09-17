<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Resources\UserResource;
use App\Http\Requests\UserRequest;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    /**
     * The user model implementation.
     *
     * @var User
     */
    protected $user;
    /**
     * Create a new controller instance.
     *
     * @param  User  $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Fetch a listing of all the users.
     *
     * @return App\Http\Resources\UserResource Collection
     */
    public function index()
    {
        $users = $this->user->paginate(100);

        return UserResource::collection($users);
    }    
    /**
     * Store a newly created user in storage.
     *
     * @param  App\Http\Requests\UserRequest
     * @return App\Http\Resources\UserResource
     */
    public function store(UserRequest $request)
    {
        $user = $this->user->create($request->all());
        
        return UserResource::make($user);
    }
    /**
     * Display the user information.
     *
     * @param  int  $id
     * @return App\Http\Resources\UserResource
     */
    public function show($id)
    {
        $user = $this->user->findOrFail($id);
        
        return UserResource::make($user);
    }    
    /**
     * Update the user info in storage.
     *
     * @param  App\Http\Requests\UserRequest
     * @param  int  $id
     * @return App\Http\Resources\UserResource
     */
    public function update(UserRequest $request, $id)
    {
        $user = $this->user->findOrFail($id);

        $user->update($request->all());

        return UserResource::make($user);
    }
    
}
