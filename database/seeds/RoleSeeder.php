<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Freelancer = new Role;
        $Freelancer->name = 'Freelancer';
        $Freelancer->details = 'Freelancers looking for projects';
        $Freelancer->save();
        
        $Client = new Role;
        $Client->name = 'Client';
        $Client->details = 'Clients posting jobs for freelancer';
        $Client->save();
        
        
    }
}