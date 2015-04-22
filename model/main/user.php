<?php
 
////
// Represents a user of the teaching assistant application for the 
// Univeristy of Utah's school of computing.
////  
class User {

   private $firstname;
   private $lastname;
   private $role;
   private $email;
   // Array of the classes the user is a TA for
   private $classesTA;
   // Array of the classes the user is teaching
   private $classesTeaching;
   // Array of user's applications
   private $applications;
   // A user's ID number
   private $id;

   public function __construct($firstname, $lastname, $role, $email, $id) 
   {
       $this->firstname = $firstname;
       $this->lastname = $lastname;
       $this->role = $role;
       $this->email = $email;
       $this->id = $id;
       $this->classesTA = array();
       $this->classesTeaching = array();
   }

   // Returns the ID of the user
   public function getID()
   {
      return $this->id;
   }

   // Returns the first and last name of the user
   public function getName() 
   {
       return $this->firstname . " " . $this->lastname;
   }

   // Returns the role of the user
   public function getRole()
   {
       return $this->role;
   }

   // Returns the e-mail of the user
   public function getEmail()
   {
      return $this->email;
   }

   // Returns an array of the classes the user is TA'ing for
   public function getClassesTA()
   {
      return $this->classesTA;
   }

   // Returns an array of the classes the user is teaching
   public function getClassesTeaching()
   {
      return $this->classesTeaching;
   }

   // Add the classes the user is TA'ing for
   public function setClassTA($class)
   {
      $this->classesTA = $class;
   }

   // Add the classes the user is teaching
   public function setClassTeaching($class)
   {
      $this->classesTeaching = $class;
   }

   public function addApplication($application)
   {
      $this->applications = $application;
   }

   public function getApplication()
   {
      return $this->applications;
   }
} 

?>