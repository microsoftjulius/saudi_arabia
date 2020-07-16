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
            'candidate_first_name'=>'Dorothy',
            'candidate_last_name'=>'Katusahabe',
            'candidate_other_name'=>'',
            'date_of_birth'=>'12/12/1970',
            'place_of_birth'=>'Kabale',
            'next_of_kin'=>'Turyamuhaki Blessed',
            'occupation'=>'House keeping',
            'education_level'=>'Degree',
            'contact'=>'0772456975',
            'consent_letter'=>'checked',
            'updated_by'=>1,
            ]);

            $this->assertEquals('Dorothy', candidates::first()->candidate_first_name);
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
        $response = $this->patch('/change-candidates/'.$to_edit->id, [
            'candidate_first_name'=>'Tina',
            'candidate_last_name'=>'Katusahabe',
            'candidate_other_name'=>'',
            'date_of_birth'=>'12/12/1970',
            'place_of_birth'=>'Kabale',
            'next_of_kin'=>'Turyamuhaki Blessed',
            'occupation'=>'House keeping',
            'education_level'=>'Degree',
            'contact'=>'0772456975',
            'consent_letter'=>'checked',
            'updated_by'=>1,
        ]);
        $this->assertEquals('Tina', candidates::first()->candidate_first_name);
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
