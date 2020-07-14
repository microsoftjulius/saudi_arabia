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
            'parent_first_name'=>'Faith',
            'parent_last_name'=>'Nalumansi',
            'parent_other_name'=>'',
            'contact'=>'0756321479',
            'address'=>'Nansana',
            'updated_by'=>1,
            ]);

        $this->assertDatabaseHas('Parents',['id'=>'1']);
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
        $this->assertEquals('2', Parents::first()->id);
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
