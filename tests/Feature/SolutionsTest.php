<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Solutions;

class SolutionsTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function createSolutions()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/create-solutions', [
            'solution_id'=>'S01',
            'solution_name'=>'Arrested',
            'reg_code'=>'01246UG',
            'final_report_print_out'=>'Printed',
            'updated_by'=>'Mr. Kikolokomba David',
            ]);

        $this->assertDatabaseHas('Solutions',['solution_id'=>'S01']);
    }
    /** @test */
    public function getSolutions(){
        $this->withoutExceptionHandling();
        $this->createSolutions();
        $response = $this->get('/get-solutions');
        $response->assertStatus(200);
    }
    /** @test */
    public function changeSolutions(){
        $this->withoutExceptionHandling();
        $this->createSolutions();
        $to_edit = Solutions::first();
        $response = $this->patch('/change-solutions/'.$to_edit->id);
        $this->assertEquals('S01', Solutions::first()->solution_id);
    }
    /** @test */
    public function removeSolutions(){
        $this->withoutExceptionHandling();
        $this->createSolutions();
        $to_delete = Solutions::first();
        $response=$this->delete('/remove-solutions/'.$to_delete->id);
        $this->assertCount(0,Solutions::all());
    }
}
