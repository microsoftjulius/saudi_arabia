<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InsurancePolicyTest extends TestCase
{
    use RefreshDatabase;
    /**
     * This function captures the insurance policy of the girl
     * @test
     */
    public function createAnInsurancePolicy(){
        $this->withoutExceptionHandling();
        $response = $this->post('/create-insuarance-policy',[
            'candidate_id'     => 1,
            'insurance_policy' => 'To get treatment',
            'created_by'       => 1,
            'updated_by'       => 1,
            'insurance_proof'  => 'proof.pdf'
        ]);
        $this->assertDatabaseHas('insurance_policies',['insurance_policy' => 'To get treatment']);
    }
}
