<?php
mysqli_report(MYSQLI_REPORT_STRICT);

class abstractDAO {
    protected $mysqli;

    /* Host address for the database */
    protected static $DB_HOST = "localhost";
    /* Database username */
    protected static $DB_USERNAME = "root";
    /* Database password */
    protected static $DB_PASSWORD = "root";
    /* Name of database */
    protected static $DB_DATABASE = "Orpheus";

    /*
     * Constructor. Instantiates a new MySQLi object.
     * Throws an exception if there is an issue connecting
     * to the database.
     */
    function __construct() {
        try{
            $this->mysqli = new mysqli(self::$DB_HOST, self::$DB_USERNAME,
                self::$DB_PASSWORD, self::$DB_DATABASE);
        }catch(mysqli_sql_exception $e){
            throw $e;
        }
    }

    public function getMysqli(){
        return $this->mysqli;

    }

}

?>
