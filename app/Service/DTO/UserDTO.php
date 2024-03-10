<?php

namespace App\Service\DTO;

use Illuminate\Support\Facades\Hash;

class UserDTO
{

    public function prepareUsersData($request)
    {
        return [
          'name'  => $request->name,
          'email' => $request->email,
          'password'  => Hash::make($request->password),
        ];
    }
}
