<?php
abstract class Model
{

    protected static string $table;
    protected static string $primary_key = "id";

    public static function find(mysqli $mysqli, int $id)
    {
        $sql = sprintf(
            "Select * from %s WHERE %s = ?",
            static::$table,
            static::$primary_key
        );

        $query = $mysqli->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();

        $data = $query->get_result()->fetch_assoc();

        return $data ? new static($data) : null;
    }

    public static function all(mysqli $mysqli)
    {
        $sql = sprintf("Select * from %s", static::$table);

        $query = $mysqli->prepare($sql);
        $query->execute();

        $data = $query->get_result();

        $objects = [];
        while ($row = $data->fetch_assoc()) {
            $objects[] = new static($row); //creating an object of type "static" / "parent" and adding the object to the array
        }

        return $objects; //we are returning an array of objects!!!!!!!!
    }

    public static function delete(mysqli $mysqli, int $id)
    {
        $sql = sprintf(
            "Delete * from %s WHERE %s=?",
            static::$table,
            static::$primary_key
        );
        $query = $mysqli->prepare($sql);
        $query->bind_param("i", $id);
        $query->execute();

        $data = $query->get_result()->fetch_assoc();
        return $data ? new static($data) : null;
    }

    public static function deleteAll(mysqli $mysqli)
    {
        $sql = sprintf(
            "DELETE * FROM TABLE %s",
            static::$table
        );
        $query = $mysqli->prepare($sql);
        $query->execute();

        $data = $query->get_result()->fetch_assoc();
        return $data ? new static($data) : null;
    }

    public function add(mysqli $mysqli, $values)
    {
        $updated = implode(", ", $values);
        $sql = sprintf(
            "INSERT INTO %s VALUES %s",
            static::$table,
            $updated
        );
        $query = $mysqli->prepare($sql);
        $query->execute();

        $data = $query->get_result()->fetch_assoc();
        return $data ? new static($data) : null;
    }

    public function update(mysqli $mysqli, array $data, string $id)
    {
        $feilds = [];
        $values = [];
        foreach ($data as $key => $value) {
            $feilds[] = "$key = ?";
            $values[] = [$value];
        }
        $updated = implode(",", $feilds);
        $sql = sprintf(
            "UPDATE %s SET %s WHERE %s = ?",
            static::$table,
            $updated,
            static::$primary_key
        );
        $query = $mysqli->prepare($sql);
        $types = str_repeat("s", count($values));
        $query->bind_param($types, $values);
        $query->bind_param("i", $id);
        $query->execute();

        $data = $query->get_result()->fetch_assoc();
        return $data ? new static($data) : null;
    }
    //you have to continue with the same mindset
    //Find a solution for sending the $mysqli everytime... 
    //Implement the following: 
    //1- update() -> non-static function 
    //2- create() -> static function
    //3- delete() -> static function 
}
