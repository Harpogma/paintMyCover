<?php

namespace Cover;

interface ICoverManager {
    public function getCovers(): array;
    public function addCover(Cover $cover): int;
    public function removeCover(int $id): bool;
}