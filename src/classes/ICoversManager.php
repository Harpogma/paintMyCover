<?php

namespace Cover;

interface ICoversManager {
    public function getCovers(): array;
    public function addCover(Cover $cover): int;
    public function removeCover(int $id): bool;
}