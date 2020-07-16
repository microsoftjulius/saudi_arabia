<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\AbroadCompany;

class AbroadCompanyTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function createAbroadCompany()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/create-abroadCompany', [
            'company_name'=>'Saudi Group Of Companies',
            'contract'=>'Available',
            'location'=>'Saudi Arabia',
            'job_types'=>'Security Guards',
            'visa_number'=>'123947563',
            'visa_date'=>'12/05/2021',
            'signature'=>'mmmmmmm',
            'updated_by'=>1,
            ]);

            $this->assertEquals('Saudi Group Of Companies', AbroadCompany::first()->company_name);
    }
    /** @test */
    public function getAbroadCompany(){
        $this->withoutExceptionHandling();
        $this->createAbroadCompany();
        $response = $this->get('/get-abroadCompany');
        $response->assertStatus(200);
    }
    /** @test */
    public function changeAbroadCompany(){
        $this->withoutExceptionHandling();
        $this->createAbroadCompany();
        $to_edit = AbroadCompany::first();
        $response = $this->patch('/change-abroadCompany/'.$to_edit->id,[
            'company_name'=>'Saudi Of Companies',
            'contract'=>'Available',
            'location'=>'Saudi Arabia',
            'job_types'=>'Security Guards',
            'visa_number'=>'123947563',
            'visa_date'=>'12/05/2021',
            'signature'=>'mmmmmmm',
            'updated_by'=>1,
            ]);
        $this->assertEquals('Saudi Of Companies', AbroadCompany::first()->company_name);
    }
    /** @test */
    public function removeAbroadCompany(){
        $this->withoutExceptionHandling();
        $this->createAbroadCompany();
        $to_delete = AbroadCompany::first();
        $response=$this->delete('/remove-abroadCompany/'.$to_delete->id);
        $this->assertCount(0,AbroadCompany::all());
    } 
}
