<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Database\Seeder;

class CompanySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            [
                'name' => 'Microsoft',
                'email' => 'info@microsoft.com',
                'website' => 'www.microsoft.com',
            ],
            [
                'name' => 'Safaricom',
                'email' => 'info@safaricom.co.ke',
                'website' => 'www.safaricom.co.ke',
            ],
            [
                'name' => 'Google',
                'email' => 'info@google.com',
                'website' => 'www.google.com',
            ],
            [
                'name' => 'Kenya Airways',
                'email' => 'info@kq.com',
                'website' => 'www.kq.com',
            ],
        ];

        $images = \Illuminate\Support\Facades\File::allFiles(public_path('/images/companies'));

        foreach ($companies as $index => $company) {
            $model = Company::create($company);

            $model->copyMedia(new \Illuminate\Http\File($images[$index]))->toMediaCollection('logo');
            $employees = Employee::factory(10)->create();
            $model->employees()->saveMany($employees);
        }
    }
}
