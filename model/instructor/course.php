<?php

////
// Represents a specific course offered by the University of Utah's
// school of computing.
////
class Course {

   // Instructor of the course
   private $instructor;
   // Array of the TA's for the course
   private $teachingAssistants;
   // The year the course is being taught
   private $year;
   // The semester the course is being taught
   private $semester;
   // The department the course is within
   private $department;
   // The course number
   private $courseNumber;
   // The name of the course being taught
   private $classeName;

   public function __construct($instructor, $year, $semester,
      $department, $courseNumber, $className) 
   {
       $this->instructor = $instructor;
       $this->teachingAssistants = array();
       $this->year = $year;
       $this->semester = $semester;
       $this->courseNumber = $courseNumber;
       $this->department = $department;
       $this->className = $className;
   }

   // Returns the full name of the course
   public function getName() 
   {
       return $this->department . " " . $this->courseNumber . " " . $this->className;
   }

   // Returns the semester and year the class is taught
   public function getSemester()
   {
       return $this->semester . " " . $this->year;
   }

   // Returns the name of the instructor for the course
   public function getInstructor()
   {
      return $this->instructor;
   }

   // Returns an array of the teaching assistants of the course
   public function getTeachingAssistants()
   {
      return $this->teachingAssistants;
   }

   // Add a TA for the class
   public function addTeachingAssistant($ta)
   {
      $this->teachingAssistants = $ta;
   }
} 

?>