<?php
// pdo.php
declare(strict_types = 1);

class MyException extends Exception {}

class DBConfig
{
    public static string $DB_CONNSTRING = "mysql:host=localhost;dbname=cursusphp;charset=utf8";
    public static string $DB_USERNAME = "root";
    public static string $DB_PASSWORD = "";
}

class BoekenDAO
{
    /**
     * @throws MyException
     */
    public function getBoeken(int $boekId): bool|array
    {
        $result = [];
        try {
            $sql = "select * from mvc_boeeken where id = :id;";
            $dbh = new PDO(DBConfig::$DB_CONNSTRING,DBConfig::$DB_USERNAME,DBConfig::$DB_PASSWORD);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $dbh->prepare($sql);
            $stmt->execute([':id' => $boekId]);
            $dbh = null;
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new MyException('Hallo, dat loopt hier goed fout');
        }

        return $result;
    }
}

$boekDao = new BoekenDAO();

try {
    print_r($boekDao->getBoeken(10));
} catch (MyException $e) {
    echo "\n" . $e->getMessage() . "\n";
}
