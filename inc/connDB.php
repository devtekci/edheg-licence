<?php

try {
            // On se connecte à MySQL
            $conn = new PDO("mysql:host=localhost;dbname=crud", "root", "",
            [
                // Mode d'erreur PDO: ERRMODE_EXCEPTION -> lève une exception
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                // Mode de récupération des données par défaut (tableau associatif)
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]);
        } catch(PDOException $e) {
            echo "Erreur: " . $e->getMessage();
        }
    
