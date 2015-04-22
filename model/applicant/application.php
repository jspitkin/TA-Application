<?php

////
// Represents all the data from a completed application
///
class Application {

   //All the personal information from the application
   private $firstname;
   private $lastname;
   private $uid;
   private $email;
   private $dayphone;
   private $eveningphone;
   private $address;
   private $aptnum;
   private $city;
   private $state;
   private $zipcode;
   private $socstudent;
   private $degree;
   private $gpa;
   private $otheremployment;
   private $otherhours;
   private $outoftown;
   private $availablehours;
   private $checksoc;
   private $extrainfo;

   public function __construct($firstname, $lastname, $uid, $email, $dayphone,
      $eveningphone, $address, $aptnum, $city, $state, $zipcode, $socstudent,
      $degree, $gpa, $otheremployment, $otherhours, $outoftown, $availablehours,
      $checksoc, $extrainfo)
   {
       $this->firstname = $firstname;
       $this->lastname = $lastname;
       $this->uid = $uid;
       $this->email = $email;
       $this->dayphone = $dayphone;
       $this->eveningphone = $eveningphone;
       $this->address = $address;
       $this->aptnum = $aptnum;
       $this->city = $city;
       $this->state = $state;
       $this->zipcode = $zipcode;
       $this->socstudent = $socstudent;
       $this->degree = $degree;
       $this->gpa = $gpa;
       $this->otheremployment = $otheremployment;
       $this->otherhours = $otherhours;
       $this->outoftown = $outoftown;
       $this->availablehours = $availablehours;
       $this->checksoc = $checksoc;
       $this->extrainfo = $extrainfo;
   }

   // Returns a string that is an organized completed form
   public function toString() 
   {
      $report =
      "<div class="report">
      <h2>Summary of your submitted application:</h2>
      <ul>
        <li>First Name: {$this->firstname} </li>
        <li>Last Name: {$this->firstname}</li>
        <li>University ID: {$this->firstname}</li>
        <li>E-mail: {$this->firstname}</li>
        <li>Day Phone: {$this->firstname}</li>
        <li>Evening Phone: {$this->firstname}</li>
        <li>Address: {$this->firstname}</li>
        <li>Apt Num: {$this->firstname}</li>
        <li>City: {$this->firstname}</li>
        <li>State: {$this->firstname}</li>
        <li>Zip Code: {$this->firstname}</li>
        <li>Are you pursuing a degree from the School of Computing? {$this->firstname}</li>
        <li>If not, what is your major? {$this->firstname}</li>
        <li>Degree program: {$this->firstname}</li>
        <li>GPA: {$this->firstname}</li>
        <li>Will you be employed other than being a TA? {$this->firstname}</li>
        <li>If so, how many hours will you work outside of being a TA? {$this->firstname}</li>
        <li>Will you be avilable the week before school starts? {$this->firstname}</li>
        <li>How many hours can you dedicate to being a TA? {$this->firstname}</li>
        <li>Do you grant the SoC the right to look at your grades? {$this->firstname}</li>
        <li>A little more about you: {$this->firstname}</li>
      </ul>
      </div>"

      return $report;
   }
} 

?>