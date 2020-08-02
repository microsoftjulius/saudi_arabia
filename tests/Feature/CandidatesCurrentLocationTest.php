<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CandidatesCurrentLocationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * This function minitors the girls current location
     * @test
     */
    public function registerCandidatesCurrentLocation(){
        $this->withoutExceptionHandling();
        $response = $this->post('/register-candidates-current-location',[
            'candidate_id' => 1,
            'longitude'    => '32.6008841',
            'latitude'     => '0.36478279999999996'
        ]);
        $this->assertDatabaseHas('candidates_current_locations',['longitude' => '32.6008841']);
    }
}
