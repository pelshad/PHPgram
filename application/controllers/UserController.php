<?php

namespace application\controllers;



class UserController extends Controller
{
    public function signin()
    {
        return "user/signin.php";
    }


    public function signup()
    {
        //강사님 테스트용 스위치문 
        /*$method = getMethod();
        switch($method) {
            case _GET:
                return;
            case _POST:
                return;
        }*/
        /*print getMethod();*/
        switch (getMethod()) {
            case _GET:
                return "user/signup.php";

            case _POST:
                $param = [
                    "email" => $_POST["email"],
                    "pw" => $_POST["pw"],
                    "nm" => $_POST["nm"]
                ];
                $param["pw"] = password_hash($param["pw"], PASSWORD_BCRYPT);
                $this->model->insUser($param);
                return "redirect:signin";
        }
    }
}
