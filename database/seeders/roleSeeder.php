<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $role = Role::firstOrCreate(['name' => 'Admin']);
        // User::find(1)->assignRole("Admin");

        Role::create(['name' => 'Provincial User'])->givePermissionTo(['display Company','Create Company','Create Trassmition',
        'Create Order','Diplay OrderDetails','Program Order','AddTrassmition',
        'CompleteAndprintBill Order','AddDiscountToTrassmition','PrgramTranssmition','PrintBill','Create license','Create Agent',
        'Display Order']);
         Role::create(['name' => 'Limit User'])->givePermissionTo(['display Company','Create Company','Create Trassmition','Create Order',
         'Diplay OrderDetails','AddTrassmition','Create license','Create Agent','Display Order']);
         Role::create(['name' => 'Checker'])->givePermissionTo(['display Company','Diplay OrderDetails','Display Order','Display Report'
         ,'Display User']);
    }
}
