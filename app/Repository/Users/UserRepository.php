<?php

namespace App\Repository\Users;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon; 
use Hash;
use Illuminate\Support\Str;

class UserRepository implements UserInterface
{
     
    public function getUsers()
    {
        return User::All();
    }

    public function getUserId(int $id)
    {
        return User::find($id);
    }

    public function create(array $attribute)
    {
       return $this->create($attribute);
    }

    public function update($id, array $attribute)
    {
       $users = $this->findOrFail($id);
       $users->update($attribute);
    }

    public function getEmail(string $email)
    {
        return User::where('email', $email)->first();
    }

    public function insertTokenresetPassword(string $email,string $token)
    {
        DB::table('password_resets')->insert([
            'email' => $email, 
            'token' => $token, 
            'created_at' => Carbon::now()
          ]);

    }

    public function getToken(string $email, string $token)
    {

    }

    public function newPassword(string $email, string $password)
    {


    }

}











