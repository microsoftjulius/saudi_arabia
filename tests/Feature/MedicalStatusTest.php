<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MedicalStatusTest extends TestCase
{
    use RefreshDatabase;
    /**
     * This test reports the girls health status(After she has reported)
     * @test
     */
    public function reportSickness(){
        $this->withoutExceptionHandling();
        $response = $this->post('/report-a-sickness',[
            'canditate_id'       => 1,
            'disease_suspected'  => 'Candida',
            'signs_and_symptoms' => 'pain during peeing'
        ]);
        $this->assertDatabaseHas('medical_statuses',['disease_suspected' => 'Candida']);
    }
}
