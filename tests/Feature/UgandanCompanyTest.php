<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\UgandanCompany;

class UgandanCompanyTest extends TestCase
{
    use RefreshDatabase;
     /** @test */
    public function createUgandanCompany()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/create-ugandanCompany', [
        'company_name'=>'Middle East Company',
        'license'=>'01246UG',
        'location'=>'Plot 247 Bugolobi',
        'contact'=>'0312749652',
        'email'=>'middleastcom@gmail.com',
        'updated_by'=>1,
            ]);

            $this->assertEquals('Middle East Company', UgandanCompany::first()->company_name);
    }
    /** @test */
    public function getUgandanCompany(){
        $this->withoutExceptionHandling();
        $this->createUgandanCompany();
        $response = $this->get('/get-ugandanCompany');
        $response->assertStatus(200);
    }
    /** @test */
    public function changeUgandanCompany(){
        $this->withoutExceptionHandling();
        $this->createUgandanCompany();
        $to_edit = UgandanCompany::first();
        $response = $this->patch('/change-ugandanCompany/'.$to_edit->id, [
            'company_name'=>'Middle East Company',
            'license'=>'01246UG',
            'location'=>'Plot 247 Bugolobi',
            'contact'=>'0312749652',
            'email'=>'middleastcom@gmail.com',
            'updated_by'=>1,
        ]);
        $this->assertEquals('Middle East Company', UgandanCompany::first()->company_name);
    }
    /** @test */
    public function removeUgandanCompany(){
        $this->withoutExceptionHandling();
        $this->createUgandanCompany();
        $to_delete = UgandanCompany::first();
        $response=$this->delete('/remove-ugandanCompany/'.$to_delete->id);
        $this->assertCount(0,UgandanCompany::all());
    } 
}
