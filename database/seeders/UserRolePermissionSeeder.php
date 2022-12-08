<?php

namespace Database\Seeders;

use App\Models\Mitra;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mytime = \Carbon\Carbon::now();
        $default_user_value = [
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ];
        DB::beginTransaction();
        try {
            $mitra = Mitra::create([
                'nama_mitra'            =>  'RSUD M YUNUS BENGKULU',
                'tanggal_kerja_sama'    =>  $mytime->toDateTimeString(),
            ]);
            $admin = User::create(array_merge([
                'mitra_id'  =>  $mitra->id,
                'email'     =>  'admin@mail.com',
                'nama_user'      =>  'Administrator',
            ], $default_user_value));
    
            $operator = User::create(array_merge([
                'mitra_id'  =>  $mitra->id,
                'email' =>  'operator@mail.com',
                'nama_user'  =>  'Operator',
            ], $default_user_value));
    
            $role_admin = Role::create(['name'    =>  'admin']);
            $role_operator = Role::create(['name'    =>  'operator']);
    
            $permission = Permission::create(['name'    =>  'read_role']);
            $permission = Permission::create(['name'    =>  'create_role']);
            $permission = Permission::create(['name'    =>  'update_role']);
            $permission = Permission::create(['name'    =>  'delete_role']);
    
            $admin->assignRole('admin');
            $operator->assignRole('operator');

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
        }
    }
}
