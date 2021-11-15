<?php

class Article{
    
    private $id;
    private $nom;
    private $quantity;
    private $prix_achat;
    private $prix_vente;
    private $image;
    private $categorie_id;
 

// Get functions
    public function get_id()
    {
        return $this->id;
    }

    public function get_nom()
    {
        return $this->nom;
    }

    public function get_prix_achat()
    {
        return $this->prix_achat;
    }

    public function get_prix_vente()
    {
        return $this->prix_vente;
    }

    public function get_quantity()
    {
        return $this->quantity;
    }

    public function get_categorie()
    {
        return $this->categorie_id;
    }

    public function get_image()
    {
        return '<img src="data:image/jpeg;base64,' .base64_encode($this->image).'"style=width:100px;height:100px;object-fit:cover">';
    }

// Update functions

    
}