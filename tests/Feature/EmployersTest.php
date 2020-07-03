<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Employers;

class EmployersTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function createEmployers()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/create-employers', [
            'employer_id'=>'E01',
            'first_name'=>'Hannat',
            'last_name'=>'Shukrah',
            'other_name'=>'',
            'contact'=>'0332479641',
            'address'=>'Saudi Arabia Capital',
            'updated_by'=>'Mr. Kikolokomba David',
            ]);

        $this->assertDatabaseHas('Employers',['employer_id'=>'E01']);
    }
    /** @test */
    public function getEmployers(){
        $this->withoutExceptionHandling();
        $this->createEmployers();
        $response = $this->get('/get-employers');
        $response->assertStatus(200);
    }
    /** @test */
    public function changeEmployers(){
        $this->withoutExceptionHandling();
        $this->createEmployers();
        $to_edit = Employers::first();
        $response = $this->patch('/change-employers/'.$to_edit->id);
        $this->assertEquals('E01', Employers::first()->employer_id);
    }
    /** @test */
    public function removeEmployers(){
        $this->withoutExceptionHandling();
        $this->createEmployers();
        $to_delete = Employers::first();
        $response=$this->delete('/remove-employers/'.$to_delete->id);
        $this->assertCount(0,Employers::all());
    } 
}
