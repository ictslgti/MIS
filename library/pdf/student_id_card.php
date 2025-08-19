<?php
// Student ID Card PDF
// Prevent warnings/notices from breaking PDF headers
ini_set('display_errors', '0');
error_reporting(E_ALL & ~E_DEPRECATED & ~E_WARNING & ~E_NOTICE);
ob_start();

require_once __DIR__ . '/tcpdf_include.php';
require_once __DIR__ . '/../../config.php';

$Sid = isset($_GET['Sid']) ? $_GET['Sid'] : null;
if (!$Sid && session_status() === PHP_SESSION_NONE) { session_start(); }
if (!$Sid && isset($_SESSION['user_name'])) { $Sid = $_SESSION['user_name']; }
if (!$Sid) { die('Student ID missing'); }

$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (mysqli_connect_errno()) { die('DB Error'); }

$sql = "SELECT s.student_id, s.student_title, s.student_fullname, s.student_ininame, s.student_profile_img, s.student_nic, s.student_blood, s.student_dob, s.student_gender, s.student_email, s.student_phone, s.student_address, s.student_em_phone, e.academic_year, c.course_name, d.department_name FROM student s LEFT JOIN student_enroll e ON e.student_id=s.student_id AND e.student_enroll_status='Following' LEFT JOIN course c ON c.course_id=e.course_id LEFT JOIN department d ON d.department_id=c.department_id WHERE s.student_id=? LIMIT 1";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, 's', $Sid);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$st = mysqli_fetch_assoc($res);
if (!$st) { die('Student not found'); }

$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false); // A4 request form
$pdf->SetCreator('MIS');
$pdf->SetAuthor($Sid);
$pdf->SetTitle('Student ID Card Request Form');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setFontSubsetting(true);
$pdf->SetFont('times', '', 11);
$pdf->AddPage();

$fullName = trim(($st['student_title'] ? $st['student_title'].'. ' : '').($st['student_fullname'] ?? ''));
$courseDept = trim(($st['course_name'] ?? '-') . ' / ' . ($st['department_name'] ?? '-'));

// Write header first
$header = '<h3 style="text-align:center">SRI LANKA GERMAN TRAINING INSTITUTE</h3>';
$header .= '<h4 style="text-align:center">Student ID Card Request Form</h4>';
$header .= '<p style="text-align:center"><i>Please print on A4 and submit with required documents.</i></p><hr/>';
$pdf->writeHTML($header, true, false, true, false, '');

// Then render photo below header
$imgW = 30; $imgH = 35;
$x = $pdf->getPageWidth() - PDF_MARGIN_RIGHT - $imgW;
$y = $pdf->GetY();
// Removed border box around photo
if (!empty($st['student_profile_img'])) {
  $pdf->Image('@'.$st['student_profile_img'], $x, $y, $imgW, $imgH, '', '', '', true, 300, '', false, false, 0, 'C', false, false);
} else {
  $pdf->SetFont('helvetica','',8);
  $pdf->SetXY($x, $y + ($imgH/2) - 3);
  $pdf->Cell($imgW, 6, 'Photo', 0, 0, 'C');
  $pdf->SetFont('times','',11);
}

$pdf->SetY($y);
$html = '';

// Personal Information
$html .= '<table width="100%" cellpadding="0" cellspacing="0"><tr>';
$html .= '<td width="83%" valign="top">';
$html .= '<h5>Personal Information</h5>';
$html .= '<table cellpadding="4" cellspacing="0" border="0" width="100%">';
$html .= '<tr><td width="35%"><b>Full Name</b></td><td width="65%">'.htmlspecialchars($fullName).'</td></tr>';
$html .= '<tr><td><b>Admission / Student ID No.</b></td><td>'.htmlspecialchars($st['student_id']).'</td></tr>';
$html .= '<tr><td><b>Course / Department</b></td><td>'.htmlspecialchars($courseDept).'</td></tr>';
$html .= '<tr><td><b>Academic Year</b></td><td>'.htmlspecialchars($st['academic_year'] ?? '-').'</td></tr>';
$html .= '<tr><td><b>Date of Birth</b></td><td>'.htmlspecialchars($st['student_dob'] ?? '-').'</td></tr>';
$html .= '<tr><td><b>Gender</b></td><td>'.htmlspecialchars($st['student_gender'] ?? '-').'</td></tr>';
$html .= '</table><br/>';

// Contact Details
$html .= '<h5>Contact Details</h5>';
$html .= '<table cellpadding="4" cellspacing="0" border="0" width="100%">';
$html .= '<tr><td width="35%"><b>Permanent Address</b></td><td width="65%">'.htmlspecialchars($st['student_address'] ?? '-').'</td></tr>';
$html .= '<tr><td><b>Mobile Number</b></td><td>'.htmlspecialchars($st['student_phone'] ?? '-').'</td></tr>';
$html .= '<tr><td><b>Email Address</b></td><td>'.htmlspecialchars($st['student_email'] ?? '-').'</td></tr>';
$html .= '</table><br/>';

// ID Card Details
$html .= '<h5>ID Card Details</h5>';
$html .= '<table cellpadding="6" cellspacing="0" border="1" width="100%">';
$html .= '<tr><td width="50%"><b>Type of Request</b><br/>[ ] New &nbsp;&nbsp; [ ] Replacement &nbsp;&nbsp; [ ] Renewal</td>';
$html .= '<td width="50%"><b>Reason for Request</b><br/><br/><br/></td></tr>';
$html .= '<tr><td><b>Blood Group</b><br/>'.htmlspecialchars($st['student_blood'] ?? '-').'</td>';
$html .= '<td><b>Emergency Contact Number</b><br/>'.htmlspecialchars($st['student_em_phone'] ?? '-').'</td></tr>';
$html .= '</table><br/>';

// Declaration
$html .= '<h5>Declaration</h5>';
$html .= '<p>I hereby certify that the above information is true and correct. I understand that providing false information may result in disciplinary action.</p>';
$html .= '<br/><table width="100%"><tr><td width="60%">Student Signature: ________________________________</td><td>Date: _____________</td></tr></table>';

// For Office Use Only
$html .= '<br/><h5>For Office Use Only</h5>';
$html .= '<table cellpadding="6" cellspacing="0" border="1" width="100%">';
$html .= '<tr><td width="50%"><b>Verified by</b>: ____________________________</td><td width="50%"><b>Approved by</b>: ____________________________</td></tr>';
$html .= '<tr><td><b>Date Issued</b>: _____________</td><td><b>ID Card Number</b>: ____________________________</td></tr>';
$html .= '</table>';
$html .= '</td>';
$html .= '<td width="17%" valign="top">&nbsp;</td>';
$html .= '</tr></table>';

$pdf->writeHTML($html, true, false, true, false, '');
// Clean any previous output to avoid header issues
if (ob_get_length()) { ob_end_clean(); }
$pdf->Output('student_id_card_request_'.$Sid.'.pdf', 'I');
