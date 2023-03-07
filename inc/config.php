<?php

    // L'expression error_reporting(~E_NOTICE) est utilisée pour masquer les notifications de niveau E_NOTICE lors de l'exécution d'un script PHP
    error_reporting(~E_NOTICE);

    require_once 'connDB.php';

    function getAll(){
            
            // On récupère la connexion à la base de données
            global $conn;
    
            // On prépare la requête de sélection des données dans la base de données
            $query = $conn->prepare("SELECT * FROM etudiants");
            // On exécute la requête de sélection des données dans la base de données
            $query->execute();
            // On récupère les données de la base de données
            $result = $query->fetchAll();
    
            // On retourne les données de la base de données
            return $result;
    
    }
    
    function insertData(){

        // On récupère la connexion à la base de données
        global $conn;

        // On récupère les données du formulaire
        if(isset($_POST['ajout1'])){
            
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $filiere = $_POST['filiere'];
            $telephone = $_POST['telephone'];

            // On récupère le nom de l'image
            $pics = $_FILES['pics']['name'];
            // On récupère le chemin temporaire de l'image
            $pics_tmp = $_FILES['pics']['tmp_name'];
            // On récupère la taille de l'image
            $img_Size = $_FILES['pics']['size']; 

            // On vérifie si les champs sont vides
            if (empty($nom) || empty($prenom) || empty($filiere) || empty($telephone) || empty($pics)) { 
                // Si les champs sont vides on l'informe
                $errMSG = "Tous les champs sont obligatoires";
            } else {

                // On défini le dossier de téléchargement
                $upload_dir = 'assets/uploads/';

                // On récupère l'extension de l'image
                $imgExt = strtolower(pathinfo($pics,PATHINFO_EXTENSION));
                
                // Extensions validés
                $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');

                // On renomme l'image avec un nombre aléatoire pour éviter les doublons
                $pics = rand(1000,1000000).".".$imgExt;

                // Vérifie si l'extension de l'image est valide
                if(in_array($imgExt, $valid_extensions)){   

                    // Vérifie si le fichier n'est pas trop volumineux
                    if($img_Size < 5000000)    {

                        // On déplace l'image dans le dossier de téléchargement
                        move_uploaded_file($pics_tmp,$upload_dir.$pics);

                    } else {

                        // Si le fichier est trop volumineux on l'informe
                        $errMSG = "Désolé, votre fichier est trop volumineux.";

                    }
                } else {

                    // Si l'extension de l'image n'est pas valide on l'informe
                    $errMSG = "Désolé, seuls les fichiers JPG, JPEG, PNG & GIF sont autorisés."; 
                     
                }
            }

            // Si il n'y a pas d'erreur on insère les données dans la base de données
            if (!isset($errMSG)) {
                // On prépare la requête d'insertion des données dans la base de données 
                $query = $conn->prepare("INSERT INTO etudiants SET nom =:nom, prenom =:prenom, filiere =:filiere, telephone =:telephone, pics =:pics");
                // On exécute la requête d'insertion des données dans la base de données
                $query->execute(compact('nom', 'prenom', 'filiere', 'telephone', 'pics'));
                // On redirige vers la page d'accueil
                header("Location: index.php");
                
            }

        }
    }

    function updateData(){
         // On récupère la connexion à la base de données
         global $conn;

         // On récupère les données du formulaire
         if(isset($_POST['upadte'])){
             
             $nom = $_POST['nom'];
             $prenom = $_POST['prenom'];
             $filiere = $_POST['filiere'];
             $telephone = $_POST['telephone'];
 
             // On récupère le nom de l'image
             $pics = $_FILES['pics']['name'];
             // On récupère le chemin temporaire de l'image
             $pics_tmp = $_FILES['pics']['tmp_name'];
             // On récupère la taille de l'image
             $img_Size = $_FILES['pics']['size']; 
 
             // On vérifie si les champs sont vides
             if (empty($nom) || empty($prenom) || empty($filiere) || empty($telephone) || empty($pics)) { 
                 // Si les champs sont vides on l'informe
                 $errMSG = "Tous les champs sont obligatoires";
             } else {
 
                 // On défini le dossier de téléchargement
                 $upload_dir = 'assets/uploads/';
 
                 // On récupère l'extension de l'image
                 $imgExt = strtolower(pathinfo($pics,PATHINFO_EXTENSION));
                 
                 // Extensions validés
                 $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
 
                 // On renomme l'image avec un nombre aléatoire pour éviter les doublons
                 $pics = rand(1000,1000000).".".$imgExt;
 
                 // Vérifie si l'extension de l'image est valide
                 if(in_array($imgExt, $valid_extensions)){   
 
                     // Vérifie si le fichier n'est pas trop volumineux
                     if($img_Size < 5000000)    {
 
                         // On déplace l'image dans le dossier de téléchargement
                         move_uploaded_file($pics_tmp,$upload_dir.$pics);
 
                     } else {
 
                         // Si le fichier est trop volumineux on l'informe
                         $errMSG = "Désolé, votre fichier est trop volumineux.";
 
                     }
                 } else {
 
                     // Si l'extension de l'image n'est pas valide on l'informe
                     $errMSG = "Désolé, seuls les fichiers JPG, JPEG, PNG & GIF sont autorisés."; 
                      
                 }
             }
 
             // Si il n'y a pas d'erreur on insère les données dans la base de données
             if (!isset($errMSG)) {
                 // On prépare la requête d'insertion des données dans la base de données 
                 $query = $conn->prepare("UPDATE INTO etudiants SET nom =:nom, prenom =:prenom, filiere =:filiere, telephone =:telephone, pics =:pics");
                 // On exécute la requête d'insertion des données dans la base de données
                 $query->execute(compact('nom', 'prenom', 'filiere', 'telephone', 'pics'));
                 // On redirige vers la page d'accueil
                 header("Location: index.php");
                 
             }
 
         }

    }