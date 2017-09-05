<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Role;
use App\Permission;

class LaratrustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return  void
     */
    public function run()
    {
        $this->command->info('Truncating User, Role and Permission tables');
        $this->truncateLaratrustTables();
        
        $support = new Role();
        $support->name         = 'support';
        $support->display_name = 'Support Administrator'; 
        $support->description  = 'User who has developed the system. Has all access rights'; 
        $support->save();

        $admin = new Role();
        $admin->name         = 'admin';
        $admin->display_name = 'Company Administrator'; 
        $admin->description  = 'User has all access rights. eg Company CEO'; 
        $admin->save();

        $user = new Role();
        $user->name         = 'user';
        $user->display_name = 'User or Blogger';
        $user->description  = 'User can only manage his/her posts and read his/her profile'; 
        $user->save();

        // Support and Admin Permissions
        $manageACL = new Permission();
        $manageACL->name         = 'manage-acl';
        $manageACL->display_name = 'Manage Roles and Permissions'; 
        $manageACL->description  = 'create, read, update and delete roles and permssions'; 
        $manageACL->save();

        $manageUsers = new Permission();
        $manageUsers->name         = 'manage-users';
        $manageUsers->display_name = 'Manage Users';
        $manageUsers->description  = 'create, read, update and delete users'; 
        $manageUsers->save();

        $manageTags = new Permission();
        $manageTags->name         = 'manage-tags';
        $manageTags->display_name = 'Manage Tags'; 
        $manageTags->description  = 'create, read, update and delete tags'; 
        $manageTags->save();

        $manageCategories = new Permission();
        $manageCategories->name         = 'manage-categories';
        $manageCategories->display_name = 'Manage Categories'; 
        $manageCategories->description  = 'create, read, update and delete categories';
        $manageCategories->save();

        $createPosts = new Permission();
        $createPosts->name = 'create-posts';
        $createPosts->display_name = 'Create Posts';
        $createPosts->description = 'create posts';
        $createPosts->save();

        $readPosts = new Permission();
        $readPosts->name = 'read-posts';
        $readPosts->display_name = 'Read Posts';
        $readPosts->description = 'read posts';
        $readPosts->save();

        $updatePosts = new Permission();
        $updatePosts->name = 'update-posts';
        $updatePosts->display_name = 'Edit Posts';
        $updatePosts->description = 'update posts';
        $updatePosts->save();

        $deletePosts = new Permission();
        $deletePosts->name = 'delete-posts';
        $deletePosts->display_name = 'Delete Posts';
        $deletePosts->description = 'delete posts';
        $deletePosts->save();

        $readProfile = new Permission();
        $readProfile->name = 'read-profile';
        $readProfile->display_name = 'Read Profile';
        $readProfile->description = 'read personal profile';
        $readProfile->save();

        $updateProfile = new Permission();
        $updateProfile->name = 'update-profile';
        $updateProfile->display_name = 'Update Profile';
        $updateProfile->description = 'update personal profile';
        $updateProfile->save();

        $support->attachPermissions([$manageACL, $manageTags, $manageUsers, $manageCategories, $readProfile, $updateProfile, $createPosts, $readPosts, $updatePosts, $deletePosts]);

        $admin->attachPermissions([$manageACL, $manageTags, $manageUsers, $manageCategories, $readProfile, $updateProfile, $createPosts, $readPosts, $updatePosts, $deletePosts]);

        $user->attachPermissions([$readProfile, $updateProfile, $createPosts, $readPosts, $updatePosts, $deletePosts]);

         $this->command->info("Creating support and admin users");
        //Create support and admin users
        $support = \App\User::create([
                'name' => 'Support',
                'email' => 'support@bluechip.com',
                'password' => bcrypt('password'),
                'remember_token' => str_random(10),
            ]);
        $support->attachRole($support);

        $admin = \App\User::create([
                'name' => 'Administrator',
                'email' => 'admin@example.com',
                'password' => bcrypt('password'),
                'remember_token' => str_random(10),
            ]);
        $admin->attachRole($admin);
    }

    /**
     * Truncates all the laratrust tables and the users table
     * @return    void
     */
    public function truncateLaratrustTables()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('permission_role')->truncate();
        DB::table('role_user')->truncate();
        \App\User::truncate();
        \App\Role::truncate();
        \App\Permission::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    
    }
}
