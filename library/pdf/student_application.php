<?php
// Student Application Form PDF
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

$sql = "SELECT s.student_id, s.student_title, s.student_fullname, s.student_ininame, s.student_gender, s.student_civil, s.student_email, s.student_nic, s.student_dob, s.student_phone, s.student_address, s.student_zip, s.student_district, s.student_divisions, s.student_provice, s.student_blood, s.student_em_name, s.student_em_phone, s.student_em_address, s.student_em_relation, s.student_profile_img, e.course_id, e.academic_year, e.course_mode, c.course_name, d.department_name FROM student s LEFT JOIN student_enroll e ON e.student_id=s.student_id AND e.student_enroll_status='Following' LEFT JOIN course c ON c.course_id=e.course_id LEFT JOIN department d ON d.department_id=c.department_id WHERE s.student_id=? LIMIT 1";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, 's', $Sid);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$st = mysqli_fetch_assoc($res);
if (!$st) { die('Student not found'); }

$pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator('MIS');
$pdf->SetAuthor($Sid);
$pdf->SetTitle('Student Application Form');
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'Student Application Form', 'SLGTI');
$pdf->setHeaderFont([PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN]);
$pdf->setFooterFont([PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA]);
$pdf->SetMargins(10, 12, 10); // tighter margins for single A4
$pdf->SetHeaderMargin(5);
$pdf->SetFooterMargin(8);
$pdf->SetAutoPageBreak(TRUE, 12);
$pdf->setFontSubsetting(true);
$pdf->SetFont('helvetica', '', 10); // compact, readable font
$pdf->AddPage();

// 1) Write page header first (smaller to save space)
$header = '<h4 style="text-align:center; margin:2px 0;">SRI LANKA GERMAN TRAINING INSTITUTE</h4>';
$header .= '<h5 style="text-align:center; margin:2px 0 6px;">Student Application Form</h5><hr style="margin:4px 0;"/>';
$pdf->writeHTML($header, true, false, true, false, '');

// 2) Render photo at the same top Y as content (top-right)
$imgW = 25; $imgH = 30; // slightly smaller to save space
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

// 3) Ensure content starts at the same Y as the photo (top-left)
$pdf->SetY($y);
$pdf->SetRightMargin(PDF_MARGIN_RIGHT);

// 4) Continue with body content in 2-column layout (83% details, 17% photo space)
$html = '';
$html .= '<table width="100%" cellpadding="0" cellspacing="0"><tr>';
$html .= '<td width="83%" valign="top">';
$html .= '<table cellpadding="2" cellspacing="0" border="0" width="100%">';
$rows = [
  ['Student ID', $st['student_id']],
  ['Full Name', $st['student_title'] . '. ' . $st['student_fullname']],
  ['Name with Initials', $st['student_ininame']],
  ['Gender', $st['student_gender']],
  ['Civil Status', $st['student_civil']],
  ['NIC', $st['student_nic']],
  ['Date of Birth', $st['student_dob']],
  ['Email', $st['student_email']],
  ['Phone', $st['student_phone']],
  ['Address', $st['student_address']],
  ['District / Division', $st['student_district'] . ' / ' . $st['student_divisions']],
  ['Province / Zip', $st['student_provice'] . ' / ' . $st['student_zip']],
  ['Blood Group', $st['student_blood']],
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
$html .= '</tr></table><br/>';
$html .= '<h5 style="margin:6px 0 2px;">Emergency Contact</h5>';
$html .= '<table cellpadding="2" cellspacing="0" border="0" width="100%">';
$erows = [
  ['Name', $st['student_em_name']],
  ['Phone', $st['student_em_phone']],
  ['Address', $st['student_em_address']],
  ['Relationship', $st['student_em_relation']]
];
foreach ($erows as $r) {
  $html .= '<tr><td width="30%"><b>'.htmlspecialchars($r[0]).'</b></td><td width="70%">'.htmlspecialchars((string)$r[1]).'</td></tr>';
}
$html .= '</table>';

// Registration Fee Payment (detailed)
$html .= '<br/>';
$html .= '<h5 style="margin:6px 0 2px;">Registration Fee Payment</h5>';
$html .= '<table cellpadding="2" cellspacing="0" border="0" width="100%">';
$html .= '<tr><td width="30%"><b>Registration Fee</b></td><td width="70%">Each student must pay LKR 1,500 as the registration fee.</td></tr>';
$html .= '<tr><td><b>Bank Name</b></td><td>People’s Bank</td></tr>';
$html .= '<tr><td><b>Branch</b></td><td>Kilinochchi Branch</td></tr>';
$html .= '<tr><td><b>Account Name</b></td><td>Sri Lanka – German Training Institute</td></tr>';
$html .= '<tr><td><b>Account Number</b></td><td>048100180086726</td></tr>';
$html .= '<tr><td><b>Accepted Methods</b></td><td>Online transfer, machine deposit, or direct bank counter payment.</td></tr>';
$html .= '<tr><td><b>Proof of Payment</b></td><td>Students must submit a copy of the bank receipt. Bank receipts are compulsory for application processing.</td></tr>';
$html .= '</table>';

// Application Form Submission
$html .= '<br/>';
$html .= '<h5 style="margin:6px 0 2px;">Application Form Submission</h5>';
$html .= '<ul style="margin:0; padding-left:14px;">';
$html .= '<li>Download/print the application form.</li>';
$html .= '<li>Attach the passport size photo and a copy of the bank payment receipt before submission.</li>';
$html .= '</ul>';

// Allowance Confirmation
$html .= '<br/>';
$html .= '<h5 style="margin:6px 0 2px;">Allowance Confirmation</h5>';
$html .= '<div style="line-height:1.4;">Students from GS-certified families with annual income below Rs. 500,000 will receive an Allowance Confirmation Letter after verification.</div>';

// Signature section at the bottom
$html .= '<br/>';
$html .= '<table width="100%" cellpadding="6" cellspacing="0" border="0">';
$html .= '<tr>';
$html .= '<td width="33%" align="center">__________________________<br/><span style="font-size:10px;">Student Signature</span></td>';
$html .= '<td width="34%" align="center">__________________________<br/><span style="font-size:10px;">Cashier Signature</span></td>';
$html .= '<td width="33%" align="center">__________________________<br/><span style="font-size:10px;">Date</span></td>';
$html .= '</tr>';
$html .= '</table>';

$html .= '<div style="font-size:10px; margin-top:6px;"><b>Attached Bill:</b> Yes / No</div>';

$pdf->writeHTML($html, true, false, true, false, '');
// Clean any previous output to avoid header issues
if (ob_get_length()) { ob_end_clean(); }
$pdf->Output('student_application_'.$Sid.'.pdf', 'I');
