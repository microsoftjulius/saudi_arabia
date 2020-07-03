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
            'UGCompany_id'=>'UG01',
            'company_name'=>'Middle East Company',
            'license'=>'01246UG',
            'location'=>'Plot 247 Bugolobi',
            'contact'=>'0312749652',
            'email'=>'middleastcom@gmail.com',
            'updated_by'=>'Mr. Kikolokomba David',
             ]);
 
         $this->assertDatabaseHas('UgandanCompany',['UGCompany_id'=>'UG01']);
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
         $response = $this->patch('/change-ugandanCompany/'.$to_edit->id);
         $this->assertEquals('UG01', UgandanCompany::first()->UGCompany_id);
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
