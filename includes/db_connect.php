<?php
/**
 * CLICOM - Connexion Base de Données (PDO)
 * Fichier: includes/db_connect.php
 * Version: 1.0
 */

require_once __DIR__ . '/config.php';

class Database {
    private static $instance = null;
    private $pdo = null;

    /**
     * Singleton pour éviter les connexions multiples
     */
    private function __construct() {
        try {
            $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET;
            
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES " . DB_CHARSET
            ];
            
            $this->pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
            
        } catch (PDOException $e) {
            if (APP_DEBUG) {
                die("Erreur de connexion à la base de données: " . $e->getMessage());
            } else {
                error_log("DB Connection Error: " . $e->getMessage());
                die("Erreur technique. Veuillez contacter l'administrateur.");
            }
        }
    }

    /**
     * Récupère l'instance unique
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Retourne l'objet PDO
     */
    public function getConnection() {
        return $this->pdo;
    }

    /**
     * Empêche le clonage
     */
    private function __clone() {}

    /**
     * Empêche la désérialisation
     */
    public function __wakeup() {
        throw new Exception("Cannot unserialize singleton");
    }
}

/**
 * Fonction helper pour récupérer la connexion rapidement
 */
function getDB() {
    return Database::getInstance()->getConnection();
}
