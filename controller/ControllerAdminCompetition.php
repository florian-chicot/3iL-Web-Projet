<?php
require_once File::build_path(array("model", "ModelCompetition.php"));

class ControllerAdminCompetition {
    
    public static function readAll() {
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $limit = 10; // Nombre de compétitions par page
        $offset = ($page - 1) * $limit;
        $competitions = ModelCompetition::readAllPaginated($limit, $offset);
        $totalCompetitions = ModelCompetition::countCompetitions();
        $totalPages = ceil($totalCompetitions / $limit);
        
        $controller = "admin";
        $view = "AdminCompetition";
        $pagetitle = "Gestion des compétitions";
        $stylesheets = ['pagination', 'modale'];
        $sports = ModelSport::readAll();
        require File::build_path(array("view", "Base.php"));
    }
    
    public static function created() {
        // Récupère les données du formulaire
        $nom = $_POST['nom'];
        $sport = $_POST['sport'];
        
        // Crée une nouvelle compétition
        ModelCompetition::create($nom, $sport);
    
        // Redirige vers la liste des compétitions
        header("Location: index.php?controller=adminCompetition&action=readAll");
        exit();
    }

    public static function updated() {
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $sport = $_POST['sport'];
    
        // Récupérer la compétition existante
        $competition = ModelCompetition::read($id);
    
        if ($competition) {
            // Mettre à jour les champs
            $competition->setNom($nom);
            $competition->setSport($sport);
            
            // Sauvegarder les modifications
            $competition->update();
        }
    
        // Redirection après la mise à jour
        header('Location: index.php?controller=AdminCompetition&action=readAll');
    }

    public static function delete() {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
        
            // Supprimer une compétition
            ModelCompetition::delete($id);
    
            // Redirige vers la liste des compétitions
            header("Location: index.php?controller=AdminCompetition&action=readAll");
            exit();
        }
    }
}
