<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Permissions;
use App\Http\Resources\PermissionsResource;

class PermissionsTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function createPermissions()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/create-permissions', [
            'permission_id'=>'PM01',
            'permisssion_name'=>'Change',
            'updated_by'=>'Mr. Kikolokomba David',
            ]);

        $this->assertDatabaseHas('Permissions',['permission_id'=>'PM01']);
    }
    /** @test */
    public function getPermissions(){
        $this->withoutExceptionHandling();
        $this->createPermissions();
        $response = $this->get('/get-permissions');
        $response->assertStatus(200);
    }
    /** @test */
    public function changePermissions(){
        $this->withoutExceptionHandling();
        $this->createPermissions();
        $to_edit = Permissions::first();
        $response = $this->patch('/change-permissions/'.$to_edit->id);
        $this->assertEquals('PM01', Permissions::first()->permission_id);
    }
    /** @test */
    public function removePermissions(){
        $this->withoutExceptionHandling();
        $this->createPermissions();
        $to_delete = Permissions::first();
        $response=$this->delete('/remove-permissions/'.$to_delete->id);
        $this->assertCount(0,Permissions::all());
    }
}
