<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use App\Departement;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role_user')->truncate();
        $adminrole=Role::where('name','Chef de division')->first();
        $userrole=Role::where('name','Employé')->first();
        $admindep=Role::where('name','Division Ressources humaines')->first();
        $userdep=Role::where('name','Division gestion du patrimoine')->first();
        $admin=User::create([
            'name'=>'Admin',
            'prenom'=>'Account',
            'departement_id' => 1,
            'phone'=>'0624330725',
            'email'=>'admin@anapec.com',
            'password'=>Hash::make('password')

        ]);

        $user=User::create([
            'name'=>'User',
            'prenom'=>'Account',
            'departement_id'=> 19,
            'phone'=>'0636728123',
            'email'=>'user@anapec.com',
            'password'=>Hash::make('password')

        ]);
        //$admin->departement()->attach($admindep);
        $admin->roles()->attach($adminrole);
        $user->roles()->attach($userrole);
        //$user->departement()->attach($userdep);
    }
}
