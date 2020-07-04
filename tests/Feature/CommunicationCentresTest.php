<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\CommunicationCentres;

class CommunicationCentresTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function createCommunicationCentres()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/create-communicationCentres', [
            'communicationCentre_id'=>'CC01',
            'centre_name'=>'Ministry of labour',
            'contact'=>'0312479652',
            'location'=>'Kampala, Uganda. P.O.Box 4216',
            'updated_by'=>'Mr. Kikolokomba David',
            ]);

        $this->assertDatabaseHas('CommunicationCentres',['communicationCentre_id'=>'CC01']);
    }
    /** @test */
    public function getCommunicationCentres(){
        $this->withoutExceptionHandling();
        $this->createCommunicationCentres();
        $response = $this->get('/get-communicationCentres');
        $response->assertStatus(200);
    }
    /** @test */
    public function changeCommunicationCentres(){
        $this->withoutExceptionHandling();
        $this->createCommunicationCentres();
        $to_edit = CommunicationCentres::first();
        $response = $this->patch('/change-communicationCentres/'.$to_edit->id);
        $this->assertEquals('CC01', CommunicationCentres::first()->communicationCentre_id);
    }
    /** @test */
    public function removeCommunicationCentres(){
        $this->withoutExceptionHandling();
        $this->createCommunicationCentres();
        $to_delete = CommunicationCentres::first();
        $response=$this->delete('/remove-communicationCentres/'.$to_delete->id);
        $this->assertCount(0,CommunicationCentres::all());
    }
}
