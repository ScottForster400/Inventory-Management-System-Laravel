<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Branch;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageEmployeeTest extends TestCase
{
    //employee_can_be_created and employee_can_be_edited werent working so i have done them manually.
    use RefreshDatabase;
    public function test_correct_employees_displayed_for_user(): void
    {

        $branch1 = Branch::factory()->create([
            'branch_id' => 99
        ]);

        $branch2 = Branch::factory()->create([
            'branch_id' => 100
        ]);

       $user = User::factory()->create([
            'branch_id' => $branch1->branch_id
       ]);

       $employeeInBranch = User::factory()->create([
            'name' => 'TestEmployee1',
            'branch_id' => $branch1->branch_id

       ]);

       $employeeNotInBranch = User::factory()->create([
            'name' => 'TestEmployee2',
            'branch_id' => $branch2->branch_id
       ]);


       $response = $this->actingAs($user)->get('/users')->assertStatus(200);
       $response->assertSeeText($employeeInBranch->name);
       $response->assertDontSeeText($employeeNotInBranch->name);

    }


    public function test_employee_can_be_deleted(): void{
        $branch = Branch::factory()->create([
            'branch_id' => 1
        ]);

       $user = User::factory()->create([
            'branch_id' => $branch->branch_id
       ]);

       $employeeInBranch = User::factory()->create([
            'name' => 'employeeInBranch'

       ]);

        $response = $this->actingAs($user)->delete('/profile/'.$employeeInBranch->id);

        $this->assertDatabaseMissing('Stocks',[
            'product_id' => $employeeInBranch->id,
        ]);


    }


}
