<? 
class Database {
    const DATABASE_CONFIGURATION_FILE = __DIR__ . '/../config/database.ini';

    private $pdo;

    public function __construct() {
        // Documentation : https://www.php.net/manual/fr/function.parse-ini-file.php
        $config = parse_ini_file(self::DATABASE_CONFIGURATION_FILE, true);

        if (!$config) {
            throw new Exception("Erreur lors de la lecture du fichier de configuration : " . self::DATABASE_CONFIGURATION_FILE);
        }

        $host     = $config['host'];
        $port     = $config['port'];
        $database = $config['database'];
        $username = $config['username'];
        $password = $config['password'];

        $this->pdo = new PDO("mysql:host=$host;port=$port;charset=utf8mb4", $username, $password);

        $sql = "CREATE DATABASE IF NOT EXISTS `$database` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $sql = "USE `$database`;";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        //table utilisateurs - help me

        //table commande tableaux, photo??
        $sql_covers = "CREATE TABLE IF NOT EXISTS covers (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL,
            album_name VARCHAR(255) NOT NULL,
            artist_name VARCHAR(255) NOT NULL,
            canvas_size VARCHAR(100) NOT NULL,
            photo 
            price_range VARCHAR(50) NOT NULL
            );";

            $stmt = $this->pdo->prepare($sql_covers);
            $stmt->execute();
 }

 public function getPdo(): PDO {
        return $this->pdo;
    }
}