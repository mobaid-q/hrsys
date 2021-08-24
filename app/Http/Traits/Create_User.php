<?php

namespace App\Http\Traits;
use App\Models\User;

trait Create_User {
    public function cr_usr($id, $fname, $lname, $type) {
        $usr = new User;
        $usr->id = $id;
        $usr->name = $fname." ".$lname;
        $usr->email = strtolower(substr($fname, 0, 1).$lname."@hrsys.com");
        $usr->password = "abc123";
        $usr->is_admin = $type;
        $usr->save();
        
    }
}