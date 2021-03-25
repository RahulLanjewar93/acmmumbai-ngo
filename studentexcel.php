<?php 
   include('schoolsession.php');
   include('dbconnect.php');
   // CREATE PHPSPREADSHEET OBJECT
require "vendor/autoload.php";

define('DB_HOST', 'localhost');
define('DB_NAME', 'ngo');
define('DB_CHARSET', 'utf8');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
$pdo = new PDO(
  "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET, 
  DB_USER, DB_PASSWORD, [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
  ]
);
  
  // CREATE PHPSPREADSHEET OBJECT
  require "vendor/autoload.php";
  use PhpOffice\PhpSpreadsheet\Spreadsheet;
  use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
  // CREATE A NEW SPREADSHEET + POPULATE DATA

  $spreadsheet = new Spreadsheet();
$spreadsheet->getProperties()
->setCreator('Intended Coders')
->setLastModifiedBy('Intended Coders')
->setTitle('Demo Document')
->setSubject('Demo Document')
->setDescription('Demo Document')
->setKeywords('demo php spreadsheet')
->setCategory('demo php file');
  
//   $spreadsheet = new Spreadsheet();
  $sheet = $spreadsheet->getActiveSheet();
  $sheet->setTitle('Users');
  $stmt = $pdo->prepare("SELECT * FROM students");
  $stmt->execute();
  $i = 1;
  while ($row = $stmt->fetch(PDO::FETCH_NAMED)) {
    $sheet->setCellValue('A'.$i, $row['name']);
    $sheet->setCellValue('B'.$i, $row['marks']);
    $sheet->setCellValue('C'.$i, $row['batch']);
    $sheet->setCellValue('D'.$i, $row['dob']);
    $sheet->setCellValue('E'.$i, $row['attendance']);
    $sheet->setCellValue('F'.$i, $row['address']);
    $sheet->setCellValue('G'.$i, $row['roll_no']);
    $sheet->setCellValue('H'.$i, $row['class']);
  
    $i++;
  }
  
//   OUTPUT
  $writer = new Xlsx($spreadsheet);
  header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
  header('Content-Disposition: attachment;filename="users.xlsx"');
  header('Cache-Control: max-age=0');
  header('Expires: Fri, 11 Nov 2011 11:11:11 GMT');
  header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
  header('Cache-Control: cache, must-revalidate');
  header('Pragma: public');
  $writer->save('php://output');

?>