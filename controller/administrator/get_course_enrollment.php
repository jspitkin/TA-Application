 <?php

// open a socket to the acs web page
$fp = fsockopen("128.110.208.39", 80, $errno, $errstr, 5);

// get the proper url based on the user's selection
$url = set_url_enrollment($_POST["semester"]);
print_r($url);

// prepare the GET requerst to pull the data.
$out = "GET " . $url . " HTTP/1.1\r\n";
$out .= "Host: www.acs.utah.edu\r\n";
$out .= "Connection: Close\r\n\r\n";


// Send GET request
fwrite($fp, $out);


// check for success
if (!$fp)
{
    $content = "Course website is offline";
}
else
{

// save the entire website into a variable and close the connection.
$page = "";
while (!feof($fp))
{
  $page .= fgets($fp, 1000);
}
fclose($fp);

// Replace all the &nbsp with white space
// Thanks to Kevin Glanville from the CS4540 forum
$page = str_replace('&nbsp;', '', $page);

// make a new DOM document representing the entire website
$doc = new DOMDocument();
$doc->loadHTML( $page );


$table = $doc->getElementsByTagName('table');
$rows = $table->item(0)->getElementsByTagName('tr');

// The information we want to scrape from the class table
$course_catalog_number;
$enrollment_cap;
$currently_enrolled;

$header_row = true;

foreach ($rows as $row)
{
  // Get all the cells in the current row
  $cells = $row->getElementsByTagName('td');

  // Reset the information
  $course_catalog_number = '';
  $enrollment_cap = '';
  $currently_enrolled = '';

  // Total of 16 cells in each row
  // Get information out of the specific cell
  // unless it's a header cell
  $current_cell = 0;
  foreach ($cells as $cell)
  {

    // Get the value of the current cell
    $content = $cell->nodeValue; 

    // If the current row is a header row, skip it
    if($header_row)
    {
      $header_row = false;
      break;
    }

    // Determine what type of cell it is
    // Skip it if it's a header cell
    switch ($current_cell) {

      case 2: // Catalog number
        $course_catalog_number = $content;
      break;

      case 5: // Enrollment Cap
        $enrollment_cap = $content;
      break;

      case 6: // Currently Enrolled
        $currently_enrolled = $content;
      break;

      default: //Do nothing
      break;
    }

    // Increment current cell
    $current_cell++;
  }

  // If the current row contained a course, write it to the database
  if($course_catalog_number !== '')
  {
    // Save the course to the database
    include './../../controller/administrator/save_course_enrollment.php';  
  }

  // Set the current cell back to zero
  $current_cell = 0;
}

}

// Sets the url to the selected semester
function set_url_enrollment($semester)
{
    $result = "/uofu/stu/scheduling/crse-info?term=";
    // Get the 4 digits representing the year
    $year = substr($semester, -4);
    // Subtract 1900 from it to get the correct format
    $year = (int)$year - 1900;
    $result .= $year;

    // Get the correct code for the selected semester
    if(substr($semester, 0, 2) == "sp")
      $semester = 4;
    if(substr($semester, 0, 2) == "su")
      $semester = 6;
    if(substr($semester, 0, 2) == "fa")
      $semester = 8;
    $result .= $semester;

    $result .= "&subj=CS";
    return $result;
}

?>