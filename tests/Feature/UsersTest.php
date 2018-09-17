<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Group;
use App\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersTest extends TestCase
{

    use RefreshDatabase;

    protected $user;
    

    public function setUp()
    {
        parent::setUp();
        $this->user = factory('App\User')->create();
    }
    /**
     * test
     *
     * @return void
     */
    public function testCanGetAllUsers()
    {

        $response = $this->get('/users')
            ->assertStatus(200)
            ->assertSee($this->user->first_name);
    }
    /**
     * test
     *
     * @return void
     */
    public function testCanGetSingleUser()
    {
        $response = $this->get('/users/'. $this->user->id)
            ->assertStatus(200)
            ->assertSee($this->user->first_name);
    }
    /** @test */
    /*
    function testUserBelongToGroup()
    {

        $this->assertInstanceOf('App\User', Group::find(1)->groupUsers->first());
    }
     * 
     */

    public function testCanCreateUser()
    {
        $payload = [
            'email' => 'email@gmail.com',
            'first_name' => 'First name',
            'last_name' => 'last name',
            'group_id' => '1'
        ];

        $response = $this->json('POST', '/users', $payload);

        $response
            ->assertStatus(201)
            ->assertSee($payload['email']);
    }

    public function testCanUpdateUser(){
        
        $payload = [
            'email' => 'updated_email@gmail.com',
            'first_name' => 'updated First name',
            'last_name' => 'updated last name',
            'group_id' => '1'
        ];

        $response = $this->json('PATCH', '/users/'. $this->user->id, $payload);

        $response          
            ->assertStatus(200)
            ->assertSee($payload['email']);
    }
}