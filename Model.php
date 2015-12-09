<?php

class Model
{
	private $attributes = [];
	protected static $table;
	protected static $dbc;
	/*
     * Constructor
     */
    public function __construct()
    {
        self::dbConnect();
    }

    /*
     * Connect to the DB
     */
    private static function dbConnect()
    {
        if (!self::$dbc)
        {
			require 'db_connect.php';
            self::$dbc = $dbc;
        }
    }

	public function __set($name, $value)
    {
        $this->attributes[$name] = $value;
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->attributes)) {
            return $this->attributes[$name];
        }
        return null;
    }

    /*
     * Persist the object to the database
     */
    public function save()
    {
  
        // @TODO: Ensure there are attributes before attempting to save
    	if(!empty($this->attributes)) {
    		if (isset($this->attributes['id'])) {
	    		$this->update($this->attributes['id']);
    		} else {
    			$this->insert();
    		}
    	}
        // @TODO: Perform the proper action - if the `id` is set, this is an update, if not it is a insert
        // @TODO: Ensure that update is properly handled with the id key
        // @TODO: After insert, add the id back to the attributes array so the object can properly reflect the id
        // @TODO: You will need to iterate through all the attributes to build the prepared query
        // @TODO: Use prepared statements to ensure data security
    }

    protected function insert()
    {
    	$keysArray = array_keys($this->attributes);
    	$table = static::$table;

    	$insert_table = "INSERT INTO $table (";
    	$insert_table .= implode(', ', $keysArray);
    	$insert_table .= ") VALUES (";

    	foreach($keysArray as $key) {
    		$newKeysArray[] = ':' . $key;
    	}

    	$insert_table .= implode(', ', $newKeysArray);
    	$insert_table .= ");";

		$stmt = self::$dbc->prepare($insert_table);

		foreach($this->attributes as $key => $value) {
			$stmt->bindValue(':' . $key, $value, PDO::PARAM_STR);
		}
		$stmt->execute();
    }

    protected function update($id)
    {
    	$updateArray = [];
    	$table = static::$table;

        foreach ($this->attributes as $key => $value) {
            $update = $key . ' = :' . $key;
            array_push($updateArray, $update);
        }

        $updateString = implode(', ', $updateArray);
       	$updateString = "UPDATE $table SET $updateString WHERE id = :id";

        $stmt = self::$dbc->prepare($updateString);
        
        foreach ($this->attributes as $key => $value) {
            $stmt->bindValue(':'. $key, $this->attributes[$key], PDO::PARAM_STR);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        }
        $stmt->execute();
    }

    /*
     * Find a record based on an id
     */
    public static function find($id)
    {
        // Get connection to the database
        self::dbConnect();
        $table = static::$table;

        // @TODO: Create select statement using prepared statements
        $query = "SELECT * FROM $table WHERE id = :id";
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // @TODO: Store the resultset in a variable named $result
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // The following code will set the attributes on the calling object based on the result variable's contents
        $instance = null;
        if ($result)
        {
            $instance = new static;
            $instance->attributes = $result;
        } else {
        	$instance = "User not found";
        }
        return $instance;
    }

    /*
     * Find all records in a table
     */
    public static function all()
    {
        self::dbConnect();
        $table = static::$table;

        $query = "SELECT * FROM $table";
        $stmt = self::$dbc->prepare($query);
        $stmt->execute();

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $instance = null;
        if ($results)
        {
            $instance = new static;
            $instance->attributes = $results;
        } else {
            $instance = "Users not found";
        }
        return $instance;
    }

    public static function delete($id)
    {
        // Get connection to the database
        self::dbConnect();
        $table = static::$table;

        $query = "DELETE FROM $table WHERE id = :id";
        $stmt = self::$dbc->prepare($query);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public static function getTableName()
    {
    	return static::$table;
    }

	public function getAttributes()
    {
    	return $this->attributes;
    }
}
?>