<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Branch;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ManageEmployeeTest extends TestCase
{
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

    public function test_new_employee_can_be_created(): void
    {
        $branch = Branch::factory()->create([
            'branch_id' => 1
        ]);

        $user = User::factory()->create([
            'branch_id' => $branch->branch_id
        ]);

       $response = $this->actingAs($user)->post('/admin/create-employee',[
            'name' => $user->name,
            'email' => $user->email,
            'password' => $user->password,
            'national_insurance_number' => $user->national_insurance_number,
            'phonenumber' => $user->phonenumber,
            'address' => $user->address,
            'admin' => $user->admin,
            'branch_id' => $user->branch_id
       ]);

       $this->assertDatabaseHas('users',[
        'name' => $user->name,
        'email' => $user->email,
        'national_insurance_number' => $user->national_insurance_number,
        'phonenumber' => $user->phonenumber,
        'address' => $user->address,
        'admin' => $user->admin,
        'branch_id' => $user->branch_id
       ]);


        //hashed password means password wont match one in database
        $this->assertNotEquals($user->password, User::where('email', $user->email)->first()->password);
       $response->assertRedirectToRoute('create.employee');

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

    public function test_employee_can_be_edited(): void{

        $user = User::factory()->create([
            'branch_id' => 1
       ]);

       $employeeInBranch = User::factory()->create([
            'name' => 'employeeInBranch',
            'phonenumber' => 12345678912
       ]);


       $response = $this->actingAs($user)->put('/profile/'.$employeeInBranch -> id,[
        'name' => 'employeeInBranch',
        'email' => $employeeInBranch->email,
        'national_insurance_number' => $employeeInBranch->national_insurance_number,
        'phonenumber' => 12345678913,
        'address' => $employeeInBranch->address,
        'admin' => $employeeInBranch->admin,
        'branch_id' => $employeeInBranch->branch_id,
       ]);

       $this->assertDatabaseHas('users',[
        'name' => 'employeeInBranch',
        'phonenumber' => 12345678913,

        ]);

        $response->assertRedirectToRoute('users.index');

    }
}
