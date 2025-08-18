<?php
if(!isset($_SESSION['user_name'])){
    // Redirect to absolute app login to work from any subdirectory
    header('Location: /MIS/index');
    exit();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="/MIS/img/favicon.ico" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/MIS/css/bootstrap.min.css">
    <link rel="stylesheet" href="/MIS/css/signin.css">
    <link href="/MIS/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <title><?php echo $title; ?></title>
    <?php if (isset($_SESSION['user_type']) && $_SESSION['user_type'] === 'STU') { ?>
    <script>
      // Defer execution until DOM is ready
      document.addEventListener('DOMContentLoaded', function () {
        try {
          const removeMenuBySectionTitle = (title) => {
            document.querySelectorAll('#sidebar .sidebar-dropdown > a span').forEach(span => {
              if (span.textContent && span.textContent.trim().toLowerCase() === title.toLowerCase()) {
                const li = span.closest('li.sidebar-dropdown');
                if (li) li.remove();
              }
            });
          };

          // Remove entire sections for students
          removeMenuBySectionTitle('Departments');
          removeMenuBySectionTitle('Canteen');
          removeMenuBySectionTitle('Blood Donations');

          // Remove Calendar (single link under Extra)
          const calendarLink = document.querySelector('#sidebar a[href="Timetable.new"], #sidebar a span');
          // Safer text-based removal if href changes
          document.querySelectorAll('#sidebar a').forEach(a => {
            if ((a.getAttribute('href') && a.getAttribute('href').includes('Timetable.new')) ||
                (a.textContent && a.textContent.trim().toLowerCase() === 'calendar')) {
              const li = a.closest('li');
              if (li) li.remove();
            }
          });
        } catch (e) {
          // Fail silently
        }
      });
    </script>
    <?php } ?>
  </head>
  <body>
  <div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
