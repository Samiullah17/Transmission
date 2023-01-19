<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class permissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        // Permission::create(['name' => 'display Company']);
        // Permission::create(['name' => 'Create Company']);
        // Permission::create(['name' => 'Deactive Company']);
        // Permission::create(['name' => 'Edit Company']); 
        // Permission::create(['name' => 'Create Trassmition']); 
        // Permission::create(['name' => 'Create Order']); 
        // Permission::create(['name' => 'Diplay OrderDetails']);
        // Permission::create(['name' => 'Program Order']); 
        // Permission::create(['name' => 'AddTrassmition']);
        // Permission::create(['name' => 'CompleteAndprintBill Order']); 
        // Permission::create(['name' => 'AddDiscountToTrassmition']);
        // Permission::create(['name' => 'PrgramTranssmition']); 
        // Permission::create(['name' => 'BackOrderToPrgram']);
        // Permission::create(['name' => 'PrintBill']); 
        // Permission::create(['name' => 'Create license']);
        // Permission::create(['name' => 'Create Agent']);
        // Permission::create(['name' => 'Display Order']);  
        // Permission::create(['name' => 'Display Report']); 
        // Permission::create(['name' => 'Display User']);
         Permission::create(['name' => 'Display RegistrationRights']);

    

    }
}
