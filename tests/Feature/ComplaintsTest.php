<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Complaints;

class ComplaintsTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function createComplaints()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/create-complaints', [
            'complaint_id'=>'C01',
            'complaint_type'=>'Rape',
            'complaint_details'=>'Rape',
            'reported_date'=>'12/04/2020',
            'resolved_date'=>'12/06/2020',
            'reported_time'=>'10:00 a.m',
            'complaint_status'=>'Resolved',
            'evidence'=>'0332479641',
            'updated_by'=>1,
            ]);

        $this->assertDatabaseHas('Complaints',['id'=>'1']);
    }
    /** @test */
    public function getComplaints(){
        $this->withoutExceptionHandling();
        $this->createComplaints();
        $response = $this->get('/get-complaints');
        $response->assertStatus(200);
    }
    /** @test */
    public function changeComplaints(){
        $this->withoutExceptionHandling();
        $this->createComplaints();
        $to_edit = Complaints::first();
        $response = $this->patch('/change-complaints/'.$to_edit->id);
        $this->assertEquals('2', Complaints::first()->id);
    }
    /** @test */
    public function removeComplaints(){
        $this->withoutExceptionHandling();
        $this->createComplaints();
        $to_delete = Complaints::first();
        $response=$this->delete('/remove-complaints/'.$to_delete->id);
        $this->assertCount(0,Complaints::all());
    } 
}
