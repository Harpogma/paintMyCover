<?php

interface IDatabase {
    public function getPdo(): PDO;
}
