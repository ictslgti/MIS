<?php
// Hostel Request Form PDF
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

$sql = "SELECT s.student_id, s.student_title, s.student_fullname, s.student_ininame, s.student_gender, s.student_email, s.student_nic, s.student_phone, s.student_address, s.student_district, s.student_provice, s.student_zip, s.student_em_name, s.student_em_phone, s.student_em_address, s.student_profile_img, e.course_id, e.academic_year, e.course_mode, c.course_name, d.department_name FROM student s LEFT JOIN student_enroll e ON e.student_id=s.student_id AND e.student_enroll_status='Following' LEFT JOIN course c ON c.course_id=e.course_id LEFT JOIN department d ON d.department_id=c.department_id WHERE s.student_id=? LIMIT 1";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, 's', $Sid);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$st = mysqli_fetch_assoc($res);
if (!$st) { die('Student not found'); }

$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator('MIS');
$pdf->SetAuthor($Sid);
$pdf->SetTitle('Hostel Request Form');
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Hostel Request Form', 'SLGTI');
$pdf->setHeaderFont([PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN]);
$pdf->setFooterFont([PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA]);
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setFontSubsetting(true);
$pdf->SetFont('times', '', 11);
$pdf->AddPage();

// 1) Write header first
$header = '<h3 style="text-align:center">SRI LANKA GERMAN TRAINING INSTITUTE</h3>';
$header .= '<h4 style="text-align:center">Hostel Request Form</h4><hr/>';
$pdf->writeHTML($header, true, false, true, false, '');

// 2) Render profile photo at top-right, below header
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

// 3) Start content at same Y; keep default right margin
$pdf->SetY($y);
$pdf->SetRightMargin(PDF_MARGIN_RIGHT);

// 4) Continue with body content
$html = '';
$html .= '<table width="100%" cellpadding="0" cellspacing="0"><tr>';
$html .= '<td width="83%" valign="top">';
$html .= '<table cellpadding="4" cellspacing="0" border="0" width="100%">';
$rows = [
  ['Student ID', $st['student_id']],
  ['Full Name', $st['student_title'] . '. ' . $st['student_fullname']],
  ['Name with Initials', $st['student_ininame']],
  ['NIC', $st['student_nic']],
  ['Phone', $st['student_phone']],
  ['Email', $st['student_email']],
  ['Address', $st['student_address']],
  ['District / Province / Zip', $st['student_district'] . ' / ' . $st['student_provice'] . ' / ' . $st['student_zip']],
  ['Course', ($st['course_name'] ?? '-') . ' (' . ($st['course_mode'] ?? '-') . ')'],
  ['Department', ($st['department_name'] ?? '-')],
  ['Academic Year', ($st['academic_year'] ?? '-')]
];
foreach ($rows as $r) {
  $html .= '<tr><td width="30%"><b>'.htmlspecialchars($r[0]).'</b></td><td width="70%">'.htmlspecialchars((string)$r[1]).'</td></tr>';
}
$html .= '</table>';
$html .= '</td>';
$html .= '<td width="17%" valign="top">&nbsp;</td>';
$html .= '</tr></table>';
$html .= '<br/>';
$html .= '<h5>Emergency Contact</h5>';
$html .= '<table cellpadding="4" cellspacing="0" border="0" width="100%">';
$erows = [
  ['Name', $st['student_em_name']],
  ['Phone', $st['student_em_phone']],
  ['Address', $st['student_em_address']]
];
foreach ($erows as $r) {
  $html .= '<tr><td width="35%"><b>'.htmlspecialchars($r[0]).'</b></td><td width="65%">'.htmlspecialchars((string)$r[1]).'</td></tr>';
}
$html .= '</table><br/>';

$html .= '<br/><br/><table width="100%"><tr><td width="50%">Signature of Student: ______________________</td><td>Date: _____________</td></tr></table>';
$html .= '<br/><br/><table width="100%"><tr><td>For Office Use: ________________________________________________</td></tr></table>';

$pdf->writeHTML($html, true, false, true, false, '');
// Clean any previous output to avoid header issues
if (ob_get_length()) { ob_end_clean(); }
$pdf->Output('hostel_request_'.$Sid.'.pdf', 'I');
