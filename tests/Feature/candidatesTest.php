<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\candidates;

class candidatesTest extends TestCase
{
    use RefreshDatabase;
   /** @test */
    public function createCandidates()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/create-candidates', [
            'candidate_id'=>'CD01',
            'employer_id'=>'E01',
            'parent_id'=>'P01',
            'abroadCompany_id'=>'AB01',
            'UGCompany_id'=>'UG01',
            'first_name'=>'Dorothy',
            'last_name'=>'Katusahabe',
            'other_name'=>'',
            'date_of_birth'=>'12/12/1970',
            'place_of_birth'=>'Kabale',
            'next_of_kin'=>'Turyamuhaki Blessed',
            'occupation'=>'House keeping',
            'education_level'=>'Degree',
            'contact'=>'0772456975',
            'consent_letter'=>'checked',
            'updated_by'=>'Licious',
            ]);

        $this->assertDatabaseHas('candidates',['candidate_id'=>'CD01']);
    }
    /** @test */
    public function getCandidates(){
        $this->withoutExceptionHandling();
        $this->createCandidates();
        $response = $this->get('/get-candidates');
        $response->assertStatus(200);
    }
    /** @test */
    public function changeCandidates(){
        $this->withoutExceptionHandling();
        $this->createCandidates();
        $to_edit = candidates::first();
        $response = $this->patch('/change-candidates/'.$to_edit->id);
        $this->assertEquals('CD01', candidates::first()->candidate_id);
    }
    /** @test */
    public function removeCandidates(){
        $this->withoutExceptionHandling();
        $this->createCandidates();
        $to_delete = candidates::first();
        $response=$this->delete('/remove-candidates/'.$to_delete->id);
        $this->assertCount(0,candidates::all());
    } 
}
