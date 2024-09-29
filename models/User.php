<?php 

class Users{
    private $conn;
    private $table='users';

    public $id;
    public $name;
    public $email;
    public $email_verified_at;
    public $password;
    public $remember_token;
    public $created_at;
    public $updated_at;


    public function __construct($db)
    {
        $this->conn=$db;
    }
    
    //create users
    public function create()
    {
        $query = 'INSERT INTO ' . $this->table.'
        SET
        id = :id,
        name = :name,
        email = :email,
        email_verified_at = :email_verified_at,
        password =:password,
        created_at = NOW(),
        updated_at = NOW()
        ';
        
        //prepared statement 
        $stmt = $this->conn->prepare($query);

        // sanitizationn of input
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->name = htmlspecialchars(strip_tags($this->name));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->email_verified_at = htmlspecialchars(strip_tags($this->email_verified_at));
        $this->password = htmlspecialchars(strip_tags($this->password));

        // Bind data
        $stmt->bindParam(':id',$this->id);
        $stmt->bindParam(':name',$this->name);
        $stmt->bindParam(':email',$this->email);
        $stmt->bindParam(':email_verified_at',$this->email_verified_at);
        $stmt->bindParam(':password',$this->password);

        // execute query
        if($stmt->execute())
        {
            return true;
        }

        // return error of something went wrong
        printf("Error: %s. \n", $stmt->error);
        return false;
    }


}