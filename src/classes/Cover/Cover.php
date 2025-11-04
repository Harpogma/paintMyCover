<?php

namespace Cover;

class Cover implements ICover {
    // Propriétés privées pour assurer l'encapsulation
    private ?int $id;
    private int $userId;
    private string $albumName;
    private string $artistName;
    private string $canvaSize;
    private string $imagePath;
    private string $priceRange;

    // Constructeur pour initialiser l'objet
    public function __construct(?int $id, int $userId, string $albumName, string $artistName, string $canvaSize, string $imagePath, string $priceRange) {
        // Vérification des données
        if (empty($albumName)) {
            throw new \InvalidArgumentException("Le nom de l'album est requis.");
        }

        if (empty($artistName)) {
            throw new \InvalidArgumentException("Le type de l'artiste est requis.");
        }

        if (empty($canvaSize)) {
            throw new \InvalidArgumentException("La taille du canva est requise.");
        }

        // Initialisation des propriétés
        $this->id = $id;
        $this->userId = $userId;
        $this->albumName = $albumName;
        $this->artistName = $artistName;
        $this->canvaSize = $canvaSize;
        $this->imagePath = $imagePath;
        $this->priceRange = $priceRange;
    }

    // Getters pour accéder aux propriétés
    public function getId(): ?int {
        return $this->id;
    }

    public function getUserId(): int {
        return $this->userId;
    }

    public function getAlbumName(): string {
        return $this->albumName;
    }

    public function getArtistName(): string {
        return $this->artistName;
    }

    public function getCanvaSize(): string {
        return $this->canvaSize;
    }

    public function getImagePath(): string {
        return $this->imagePath;
    }

    public function getPriceRange(): string {
        return $this->priceRange;
    }

    // Setters pour modifier les propriétés
    public function setUserId(int $userId): void {
        $this->userId = $userId;
    }

    public function setAlbumName(string $albumName): void {
        if (empty($albumMame)) {
            throw new \InvalidArgumentException("Le nom de l'album est requis.");
        }

        $this->albumName = $albumMame;
    }

    public function setArtistName(string $artistName): void {
        if (empty($artistName)) {
            throw new \InvalidArgumentException("Le type de l'artiste est requis.");
        }

        $this->artistName = $artistName;
    }

    public function setCanvaSize(string $canvaSize): void {
        if (empty($canvaSize)) {
            throw new \InvalidArgumentException("La taille du canva est requise.");
        }

        $this->canvaSize = $canvaSize;
    }

    public function setImagePath(string $imagePath): void {
        if (empty($imagePath)) {
            throw new \InvalidArgumentException("Le chemin d'accès de l'image est requis.");
        }

        $this->imagePath = $imagePath;
    }

    public function setPriceRange(string $priceRange): void {
        if (empty($imagePath)) {
            throw new \InvalidArgumentException("La fourchette de prix est requise.");
        }

        $this->priceRange = $priceRange;
    }
}
