<?php

namespace Cover;

interface ICover {
    public function getAlbumName(): string;
    public function getArtistName(): string;
    public function getCanvaSize(): string;
    public function getImagePath(): string;
    public function getPriceRange(): string;

    public function setAlbumName(string $albumName): void;
    public function setArtistName(string $artistName): void;
    public function setCanvaSize(string $canvaSize): void;
    public function setImagePath(string $imagePath): void;
    public function setPriceRange(string $priceRange): void;
}