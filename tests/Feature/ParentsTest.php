<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Parents;

class ParentsTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function createParents()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/create-parents', [
            'parent_id'=>'P01',
            'first_name'=>'Faith',
            'last_name'=>'Nalumansi',
            'other_name'=>'',
            'contact'=>'0756321479',
            'address'=>'Nansana',
            'updated_by'=>'Mr. Kikolokomba David',
            ]);

        $this->assertDatabaseHas('Parents',['parent_id'=>'P01']);
    }
    /** @test */
    public function getParents(){
        $this->withoutExceptionHandling();
        $this->createParents();
        $response = $this->get('/get-parents');
        $response->assertStatus(200);
    }
    /** @test */
    public function changeParents(){
        $this->withoutExceptionHandling();
        $this->createParents();
        $to_edit = Parents::first();
        $response = $this->patch('/change-parents/'.$to_edit->id);
        $this->assertEquals('P01', Parents::first()->parent_id);
    }
    /** @test */
    public function removeParents(){
        $this->withoutExceptionHandling();
        $this->createParents();
        $to_delete = Parents::first();
        $response=$this->delete('/remove-parents/'.$to_delete->id);
        $this->assertCount(0,Parents::all());
    } 
}
