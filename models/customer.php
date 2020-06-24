<?php

class Customer{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function addCustomer($data){
        // Prepare Query
        $this->db->query('INSERT INTO customers (id , full_name , email) VALUES (:id , :full_name , :email)');
    
        // Bind Values
        $this->db->bind(":id" , $data['id']);
        $this->db->bind(":full_name" , $data['full_name']);
        $this->db->bind(":email" , $data['email']);
    
        // Execute
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    
    }

}

?>