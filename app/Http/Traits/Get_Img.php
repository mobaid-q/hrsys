<?php

namespace App\Http\Traits;
use App\Models\Employee;

trait Get_Img {
    public function img_set($id) {
        $prof_img = Employee::select('e_image')->where('e_id', $id)->get();
        session()->put('prof_pic', $prof_img[0]->e_image);
        
    }
}