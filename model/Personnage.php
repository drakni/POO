<?php
class Personnage
{
  private $_degats,
          $_id,
          $_nom;
          $_niveau;
          $_experience;
  
  const CEST_MOI = 1; // Constante renvoyée par la méthode `frapper` si on se frappe soi-même.
  const PERSONNAGE_TUE = 2; // Constante renvoyée par la méthode `frapper` si on a tué le personnage en le frappant.
  const PERSONNAGE_FRAPPE = 3; // Constante renvoyée par la méthode `frapper` si on a bien frappé le personnage.
  const NIVEAU_GAGNE = 1;
  
  
  public function __construct(array $donnees)
  {
    $this->hydrate($donnees);
  }
  
  public function frapper(Personnage $perso)
  {
    if ($perso->id() == $this->_id)
    {
      return self::CEST_MOI;
    } else 
    {
      $perso->gagnerExp();
    }
    
    // On indique au personnage qu'il doit recevoir des dégâts.
    // Puis on retourne la valeur renvoyée par la méthode : self::PERSONNAGE_TUE ou self::PERSONNAGE_FRAPPE
    return $perso->recevoirDegats();
  }
  
  public function hydrate(array $donnees)
  {
    foreach ($donnees as $key => $value)
    {
      $method = 'set'.ucfirst($key);
      
      if (method_exists($this, $method))
      {
        $this->$method($value);
      }
    }
  }
  
  public function recevoirDegats()
  {
    $this->_degats += 5;
    
    // Si on a 100 de dégâts ou plus, on dit que le personnage a été tué.
    if ($this->_degats >= 100)
    {
      return self::PERSONNAGE_TUE;
    }
    
    // Sinon, on se contente de dire que le personnage a bien été frappé.
    return self::PERSONNAGE_FRAPPE;
  }

  public function gagnerExp(){
    $this->_experience += 20;

    //Si expérience = 100, on gagne un niveau et l'xp retombe à 0
    if ($this->_experience >= 100)
    {
      $this->gagnerNiveau();
      $this->_experience = 0;
      return self::NIVEAU_GAGNE;
    }
    
  }

  public function gagnerNiveau(){
    $this->_experience += 1;

    //Si niveau = 100, niveau max
    if ($this->_niveau >= 100)
    {
      $this->_niveau = 100;
    }
    return true;
  }

  public function nomValide()
  {
    return !empty($this->_nom);
  }
  
  
  // GETTERS //
  

  public function degats()
  {
    return $this->_degats;
  }
  
  public function id()
  {
    return $this->_id;
  }
  
  public function nom()
  {
    return $this->_nom;
  }

   public function niveau()
  {
    return $this->_niveau;
  }

   public function experience()
  {
    return $this->_experience;
  }
  
  public function setDegats($degats)
  {
    $degats = (int) $degats;
    
    if ($degats >= 0 && $degats <= 100)
    {
      $this->_degats = $degats;
    }
  }

  public function setExperience($experience)
  {
    $experience = (int) $experience;
    
    if ($experience >= 0 && $experience <= 100)
    {
      $this->_experience = $experience;
    }
  }

  public function setNiveau($niveau)
  {
    $niveau = (int) $niveau;
    
    if ($niveau >= 1 && $niveau <= 100)
    {
      $this->_niveau = $niveau;
    }
  }
  
  public function setId($id)
  {
    $id = (int) $id;
    
    if ($id > 0)
    {
      $this->_id = $id;
    }
  }
  
  public function setNom($nom)
  {
    if (is_string($nom))
    {
      $this->_nom = $nom;
    }
  }
}