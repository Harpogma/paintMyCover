<?php

namespace Cover;

require_once __DIR__ . '/../utils/autoloader.php';

use Database;

class CoversManager implements ICoversManager {
    private $database;

    public function __construct() {
        $this->database = new Database();
    }

    public function getCovers(): array {
        // Définition de la requête SQL pour récupérer tous les covers
        $sql = "SELECT * FROM covers";

        // Préparation de la requête SQL
        $stmt = $this->database->getPdo()->prepare($sql);

        // Exécution de la requête SQL
        $stmt->execute();

        // Récupération de tous les outils
        $covers = $stmt->fetchAll();

        // Transformation des tableaux associatifs en objets Cover
        $covers = array_map(function ($coverData) {
            return new Cover(
                $coverData['id'],
                //$coverData['userId'],
                $coverData['albumName'],
                $coverData['artistName'],
                $coverData['canvaSize'],
                $coverData['imagePath'],
                $coverData['priceRange']
            );
        }, $covers);

        // Retour de tous les covers
        return $covers;
    }

    public function addCover(Cover $cover): int {
        // Définition de la requête SQL pour ajouter une cover
        $sql = "INSERT INTO covers (album_name, artist_name, canva_size, image_path, price_range) VALUES (:albumName, :artistName, :canvaSize, :imagePath, :priceRange)";

        // Préparation de la requête SQL
        $stmt = $this->database->getPdo()->prepare($sql);

        // Lien avec les paramètres
        $stmt->bindValue(':name', $cover->getAlbumName());
        $stmt->bindValue(':type', $cover->getArtistName());
        $stmt->bindValue(':type', $cover->getCanvaSize());
        $stmt->bindValue(':type', $cover->getImagePath());
        $stmt->bindValue(':type', $cover->getPriceRange());

        // Exécution de la requête SQL pour ajouter un outil
        $stmt->execute();

        // Récupération de l'identifiant de l'outil ajouté
        $coverId = $this->database->getPdo()->lastInsertId();

        // Retour de l'identifiant de l'outil ajouté.
        return $coverId;
    }

    public function removeCover(int $id): bool {
        // Définition de la requête SQL pour supprimer une cover
        $sql = "DELETE FROM covers WHERE id = :id";

        // Préparation de la requête SQL
        $stmt = $this->database->getPdo()->prepare($sql);

        // Lien avec le paramètre
        $stmt->bindValue(':id', $id);

        // Exécution de la requête SQL pour supprimer un outil
        return $stmt->execute();
    }
}
