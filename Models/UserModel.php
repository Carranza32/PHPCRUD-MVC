<?php
class UserModel extends Model{
    public function __construct() {
        parent::__construct();

        $this->db = Database::getInstance();
    }

    public function getAll()
    {
        return $this->db->executeQuery("SELECT * FROM users");
    }

    public function getCategories()
    {
        return $this->db->executeQuery("SELECT * FROM categories");
    }

    public function getUser($id)
    {
        return $this->db->executeQuery("SELECT * FROM users WHERE id = ".$id);
    }

    public function insert($data)
    {
        $date = date("Y-m-d", strtotime("now"));

        $sql = "INSERT INTO users (name, email, direction, password, created_at, role) VALUES ('{$data['name']}', '{$data['email']}', '{$data['address']}', '{$data['password']}', '{$date}', '{$data['role']}')";

        return $this->db->executeQuery($sql);
    }

    public function update($data)
    {
        $sql = "UPDATE users SET name='{$data['name']}', email='{$data['email']}', direction='{$data['address']}', role='{$data['role']}' WHERE id = '{$data['id']}' ";

        return $this->db->executeQuery($sql);
    }

    public function destroy($id)
    {
        $sql = "DELETE FROM users WHERE id = '{$id}' ";

        return $this->db->executeQuery($sql);
    }
}
?>