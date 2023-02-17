<?php 

class Region {
    //creating properties for new class
    public ?string $id = null;
    public ?string $name = null;
    public ?string $slug = null;

    //take two private function into our code
    public function save() :void {
        if (isset($this->id)) {
            $this->update();
        } else {
            $this->insert();
        }
    }
    public function delete() :void {

        $query = "
        DELETE
        FROM `regions`
        WHERE `id` = ?
        ";
        DB::delete($query, [$this->id]);
    }


    // inserta function made according to the DB class
    private function insert() : void {
        $query = 
        "
        INSERT
        INTO `regions`
        (`name`, `slug`)
        VALUES
        (?, ?)
        ";
        DB::insert($query, [$this->name, $this->slug]);
        // assigning property id to the last used one using a function from the DB class
        $this->id = DB::lastInsertId();

    }

    // update function made according to DB class
    private function update() : void {
           
        $query = 
        "
        UPDATE `regions`
        SET `name` = ?,
            `slug` = ?
        WHERE `id` = ?;      
        ";
        DB::update($query, [$this->name, $this->slug, $this->id]);
    }
}