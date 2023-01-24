<?php 

class Role extends DbObject {
    protected static $table = 'roles';
    protected static $table_fields = array(
        'id',
        'name',
        'created_at',
        'updated_at'
    );

    public $id;
    public $name;
    public $created_at;
    public $updated_at;
    


}

?>