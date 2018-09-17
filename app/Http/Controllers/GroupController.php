<?php

namespace App\Http\Controllers;

use App\Group;
use App\Http\Resources\GroupResource;
use App\Http\Resources\UserResource;
use App\Http\Requests\GroupRequest;
use Illuminate\Routing\Controller;

class GroupController extends Controller
{
    /**
     * The group model implementation.
     *
     * @var Group
     */
    protected $group;
    /**
     * Create a new controller instance.
     *
     * @param  Group  $group
     * @return void
     */
    public function __construct(Group $group)
    {
        $this->group = $group;
    }
    /**
     * Display a listing of the groups.
     *
     * @return \App\Http\Resources\GroupResource Collection
     */
    public function index()
    {
        $groups = $this->group->oldest('id')->paginate(100);

        return GroupResource::collection($groups);
    }
    /**
     * Store a newly created group in storage.
     *
     * @param  \App\Http\Requests\GroupRequest  $request
     * @return \App\Http\Resources\GroupResource
     */
    public function store(GroupRequest $request)
    {
        $group = $this->group->create($request->all());
        
        return GroupResource::make($group);
    }    
    /**
     * Update the specified group in storage.
     *
     * @param  \App\Http\Requests\GroupRequest  $request
     * @param  id  $id
     * @return \App\Http\Resources\GroupResource
     */
    public function update(GroupRequest $request, $id)
    {
        $group = $this->group->findOrFail($id);

        $group->update($request->all());

        return GroupResource::make($group);
    }
    
}
