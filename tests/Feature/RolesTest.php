<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Roles;

class RolesTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function createRoles()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/create-roles', [
            'role_id'=>'R01',
            'role_name'=>'Administrator',
            'updated_by'=>'Mr. Kikolokomba David',
            ]);

        $this->assertDatabaseHas('Roles',['role_id'=>'R01']);
    }
    /** @test */
    public function getRoles(){
        $this->withoutExceptionHandling();
        $this->createRoles();
        $response = $this->get('/get-roles');
        $response->assertStatus(200);
    }
    /** @test */
    public function changeRoles(){
        $this->withoutExceptionHandling();
        $this->createRoles();
        $to_edit = Roles::first();
        $response = $this->patch('/change-roles/'.$to_edit->id);
        $this->assertEquals('R01', roles::first()->role_id);
    }
    /** @test */
    public function removeRoles(){
        $this->withoutExceptionHandling();
        $this->createRoles();
        $to_delete = Roles::first();
        $response=$this->delete('/remove-roles/'.$to_delete->id);
        $this->assertCount(0,Roles::all());
    }
}
