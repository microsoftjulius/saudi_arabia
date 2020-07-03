<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\MedicalHistory;

class MedicalHistoryTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function createMedicalHistory()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/create-medicalHistory', [
            'medic_id'=>'MH01',
            'candidate_id'=>'CD01',
            'premedical_status'=>'checked',
            'premedical_status_date'=>'12/04/2020',
            'final_medical_test'=>'checked',
            'predepature_medical_tests'=>'checked',
            'covid19_certificate'=>'checked',
            'covid19_certificate_date'=>'12/012/2020',
            'updated_by'=>'Mr. Kikolokomba David',
            ]);

        $this->assertDatabaseHas('MedicalHistory',['medic_id'=>'MH01']);
    }
    /** @test */
    public function getMedicalHistory(){
        $this->withoutExceptionHandling();
        $this->createMedicalHistory();
        $response = $this->get('/get-medicalHistory');
        $response->assertStatus(200);
    }
    /** @test */
    public function changeMedicalHistory(){
        $this->withoutExceptionHandling();
        $this->createMedicalHistory();
        $to_edit = MedicalHistory::first();
        $response = $this->patch('/change-medicalHistory/'.$to_edit->id);
        $this->assertEquals('MH01', MedicalHistory::first()->medic_id);
    }
    /** @test */
    public function removeMedicalHistory(){
        $this->withoutExceptionHandling();
        $this->createMedicalHistory();
        $to_delete = MedicalHistory::first();
        $response=$this->delete('/remove-medicalHistory/'.$to_delete->id);
        $this->assertCount(0,MedicalHistory::all());
    }
}
