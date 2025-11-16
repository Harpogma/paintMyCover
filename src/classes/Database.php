<?
class Database implements IDatabase {
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

        $users = "CREATE TABLE IF NOT EXISTS user (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(255) NOT NULL,
            email VARCHAR(255) UNIQUE,
            password VARCHAR(255) NOT NULL, 
            role VARCHAR(25) NOT NULL
        );";

        $stmt = $this->pdo->prepare($users);
        $stmt->execute();

        //table commande tableaux, photo??
        $covers = "CREATE TABLE IF NOT EXISTS cover (
            id INT AUTO_INCREMENT PRIMARY KEY,
            album_name VARCHAR(255) NOT NULL,
            artist_name VARCHAR(255) NOT NULL,
            canvas_size VARCHAR(100) NOT NULL,
            image VARCHAR(50) NOT NULL,
            price_range VARCHAR(50) NOT NULL
        );";

        $stmt = $this->pdo->prepare($covers);
        $stmt->execute();

        $user_cover = "CREATE TABLE IF NOT EXISTS user_cover (
            PRIMARY KEY (user_id, cover_id),
            user_id INT NOT NULL,
            cover_id INT NOT NULL,
            FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE,
            FOREIGN KEY (cover_id) REFERENCES cover(id) ON DELETE CASCADE
        );";

        $stmt = $this->pdo->prepare($user_cover);
        $stmt->execute();
    }

 public function getPdo(): PDO {
        return $this->pdo;
    }
}