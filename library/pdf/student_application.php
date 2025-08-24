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
$pdf->SetMargins(10, 12, 10); // tight margins for single A4
$pdf->SetHeaderMargin(5);
$pdf->SetFooterMargin(6);
$pdf->SetAutoPageBreak(TRUE, 8);
$pdf->setFontSubsetting(true);
$pdf->setCellPadding(0.5);
$pdf->SetFont('helvetica', '', 9.5); // slightly smaller to fit one page
$pdf->AddPage();

// 1) Write page header first (smaller to save space)
$header = '<h4 style="text-align:center; margin:2px 0;">SRI LANKA GERMAN TRAINING INSTITUTE</h4>';
$header .= '<h5 style="text-align:center; margin:2px 0 4px;">Student Application Form</h5><hr style="margin:2px 0;"/>';
$pdf->writeHTML($header, true, false, true, false, '');

// 2) Load ID-card photo from student_idphoto (fallback to profile image if missing)
$imgW = 24; $imgH = 32; // 3:4 ratio (compact)
$x = $pdf->getPageWidth() - PDF_MARGIN_RIGHT - $imgW;
$y = $pdf->GetY();

// Try fetch id_photo blob
$idPhotoBlob = null;
if (!empty($st['student_id'])) {
  $ps = mysqli_prepare($con, "SELECT id_photo FROM student_idphoto WHERE student_id=? LIMIT 1");
  if ($ps) {
    mysqli_stmt_bind_param($ps, 's', $st['student_id']);
    if (mysqli_stmt_execute($ps)) {
      $pr = mysqli_stmt_get_result($ps);
      if ($pr && ($prow = mysqli_fetch_assoc($pr)) && !is_null($prow['id_photo'])) {
        $idPhotoBlob = $prow['id_photo'];
      }
    }
    mysqli_stmt_close($ps);
  }
}

// Render photo if available
if ($idPhotoBlob) {
  $pdf->Image('@'.$idPhotoBlob, $x, $y, $imgW, $imgH, '', '', '', true, 300, '', false, false, 0, 'C', false, false);
} elseif (!empty($st['student_profile_img'])) {
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
$html .= '<td width="85%" valign="top">';
$html .= '<table cellpadding="1" cellspacing="0" border="0" width="100%">';
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
  $html .= '<tr><td width="27%" align="right"><b>'.htmlspecialchars($r[0]).'</b></td><td width="73%">'.htmlspecialchars((string)$r[1]).'</td></tr>';
}
$html .= '</table>';
$html .= '</td>';
$html .= '<td width="15%" valign="top">&nbsp;</td>';
$html .= '</tr></table>';
$html .= '<div style="height:4px;"></div>';
$html .= '<div style="font-weight:600; margin:2px 0;">Emergency Contact</div>';
$html .= '<table cellpadding="1" cellspacing="0" border="0" width="100%">';
$erows = [
  ['Name', $st['student_em_name']],
  ['Phone', $st['student_em_phone']],
  ['Address', $st['student_em_address']],
  ['Relationship', $st['student_em_relation']]
];
foreach ($erows as $r) {
  $html .= '<tr><td width="27%" align="right"><b>'.htmlspecialchars($r[0]).'</b></td><td width="73%">'.htmlspecialchars((string)$r[1]).'</td></tr>';
}
$html .= '</table>';

// Signature section at the bottom
$html .= '<div style="height:6px;"></div>';
$html .= '<table width="100%" cellpadding="3" cellspacing="0" border="0">';
$html .= '<tr>';
$html .= '<td width="50%" align="center">__________________________<br/><span style="font-size:9px;">Student Signature</span></td>';
$html .= '<td width="50%" align="center">__________________________<br/><span style="font-size:9px;">Date</span></td>';
$html .= '</tr>';
$html .= '</table>';

// Removed payment-related attachment section

$pdf->writeHTML($html, true, false, true, false, '');
// Clean any previous output to avoid header issues
if (ob_get_length()) { ob_end_clean(); }
$pdf->Output('student_application_'.$Sid.'.pdf', 'I');
