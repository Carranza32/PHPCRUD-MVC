<?php
class ProductoModel extends Model{
    public function __construct() {
        parent::__construct();

        $this->db = Database::getInstance();
    }

    public function getAll()
    {
        return $this->db->executeQuery("SELECT products.*, categories.NAME AS category FROM products INNER JOIN categories ON products.category_id = categories.id");
    }

    public function getCategories()
    {
        return $this->db->executeQuery("SELECT * FROM categories");
    }

    public function getProduct($id)
    {
        return $this->db->executeQuery("SELECT * FROM products WHERE id = ".$id);
    }

    public function insert($data)
    {
        $sql = "INSERT INTO products (name, stock, description, category_id, is_active) VALUES ('{$data['name']}', '{$data['stock']}', '{$data['description']}', {$data['category_id']}, {$data['is_active']})";

        return $this->db->executeQuery($sql);
    }

    public function update($data)
    {
        $sql = "UPDATE products SET name='{$data['name']}', stock='{$data['stock']}', description='{$data['description']}', category_id={$data['category_id']}, is_active={$data['is_active']} WHERE id = '{$data['id']}' ";

        return $this->db->executeQuery($sql);
    }

    public function destroy($id)
    {
        $sql = "DELETE FROM products WHERE id = '{$id}' ";

        return $this->db->executeQuery($sql);
    }
}
?>