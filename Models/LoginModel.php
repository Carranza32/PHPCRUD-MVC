<?php
class LoginModel extends Model
{
    public function __construct()
    {
        parent::__construct();

        $this->db = Database::getInstance();
    }

    public function login($data)
    {
        $email = $data['email'];
        $password = $data['password'];
        $password_confirm = $data['password_confirm'];

        return $this->db->executeQuery("SELECT * FROM users WHERE email = '{$email}'");

        if ($data != null) {
            if ($data['password'] == $password) {
                return $data;
            }

            return null;
        }

        return null;
    }
}