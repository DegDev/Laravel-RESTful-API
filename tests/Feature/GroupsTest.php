<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class GroupsTest extends TestCase
{
    use RefreshDatabase;

    protected $group;


    public function setUp()
    {
        parent::setUp();
        $this->group = factory('App\User')->create();
    }
    /**
     * test
     *
     * @return void
     */
    public function testCanGetAllGroups()
    {
        $response = $this->get('/groups')
            ->assertStatus(200)
            ->assertSee($this->group->name);
    }
    
     public function testCanCreateGroup()
    {
        $payload = ['name' => 'new group name'];

        $response = $this->json('POST', '/groups', $payload);

        $response
            ->assertStatus(201)
            ->assertSee($payload['name']);
    }

     public function testCanUpdateGroup(){

        $payload = ['name' => 'updated group name'];

        $response = $this->json('PATCH', '/groups/'. $this->group->id, $payload);

        $response
            ->assertStatus(200)
            ->assertSee($payload['name']);
    }
}
