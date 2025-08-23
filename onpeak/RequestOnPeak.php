<!-- BLOCK#1 START DON'T CHANGE THE ORDER-->
<?php
$title = "OnPeak Request | SLGTI";
include_once("../config.php");
include_once("../head.php");
// Use the compact student top nav and remove sidebar/menu for this page
include_once("../student/top_nav.php");


//  $student_id = $_SESSION['user_name'];
//  $user_type = $_SESSION['user_type'];
//  echo $department_id = $_SESSION['department_code'];
//  if($user_type == 'ADM'){
if ($_SESSION['user_type'] == 'STU') {
?>
<!--END DON'T CHANGE THE ORDER-->

<!--BLOCK#2 START YOUR CODE HERE -->

<!--insert Code-->
<?php

    $s_id =  $_SESSION['user_name'];
    $u_type =  $_SESSION['user_type'];

    $student_id = $name = $department_id = null;
    if ($_SESSION['user_type'] == 'STU') {
        // Derive current department_id from the student's active enrollment
        $sql = "SELECT d.department_id
           FROM student_enroll e
           JOIN course c ON e.course_id = c.course_id
           JOIN department d ON c.department_id = d.department_id
           WHERE e.student_id = '$s_id' AND e.student_enroll_status='Following'
           LIMIT 1";
        if ($result = mysqli_query($con, $sql)) {
            if (mysqli_num_rows($result) >= 1) {
                $row = mysqli_fetch_assoc($result);
                $department_id = $row['department_id'];
            }
            mysqli_free_result($result);
        }
    }
    ?>

<?PHP
    // If editing, load the existing record for this student
    $editing_id = 0;
    $form_contact_no = '';
    $form_reason = '';
    $form_exit_date = '';
    $form_exit_time = '';
    $form_return_date = '';
    $form_return_time = '';
    $form_comment = '';

    if (isset($_GET['edit'])) {
        $maybe_id = (int) $_GET['edit'];
        if ($maybe_id > 0) {
            $owner_id = mysqli_real_escape_string($con, $s_id);
            // Only allow editing if status is Pending approval
            $sql = "SELECT * FROM `onpeak_request` WHERE `id`=$maybe_id AND `student_id`='$owner_id' AND TRIM(LOWER(`onpeak_request_status`)) LIKE 'pending%'";
            if ($res = mysqli_query($con, $sql)) {
                if (mysqli_num_rows($res) === 1) {
                    $row = mysqli_fetch_assoc($res);
                    $editing_id = (int) $row['id'];
                    $form_contact_no = $row['contact_no'];
                    $form_reason = $row['reason'];
                    $form_exit_date = $row['exit_date'];
                    $form_exit_time = $row['exit_time'];
                    $form_return_date = $row['return_date'];
                    $form_return_time = $row['return_time'];
                    $form_comment = $row['comment'];
                }
                mysqli_free_result($res);
            }
        }
    }

    // Handle create or update
    if (isset($_POST['req']) || isset($_POST['update'])) {
        // Always take student id from session for security
        $s_id = mysqli_real_escape_string($con, $_SESSION['user_name']);
        // Use derived $department_id (no user input)
        $d_id = mysqli_real_escape_string($con, $department_id);
        $contact_no = mysqli_real_escape_string($con, $_POST['contact_no']);
        $reason = mysqli_real_escape_string($con, $_POST['reason']);
        $exit_date = mysqli_real_escape_string($con, $_POST['exit_date']);
        $exit_time = mysqli_real_escape_string($con, $_POST['exit_time']);
        $return_date = mysqli_real_escape_string($con, $_POST['return_date']);
        $return_time = mysqli_real_escape_string($con, $_POST['return_time']);
        $comment = mysqli_real_escape_string($con, $_POST['comment']);

        // Server-side required validation
        $errors = [];
        if ($contact_no === '') { $errors[] = 'Contact Number is required'; }
        if ($reason === '') { $errors[] = 'Reason is required'; }
        if ($exit_date === '') { $errors[] = 'Exit Date is required'; }
        if ($exit_time === '') { $errors[] = 'Exit Time is required'; }
        if ($return_date === '') { $errors[] = 'Return Date is required'; }
        if ($return_time === '') { $errors[] = 'Return Time is required'; }
        if (!empty($errors)) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Please fix the following:</strong><ul class="mb-0">';
            foreach ($errors as $e) { echo '<li>'.htmlspecialchars($e).'</li>'; }
            echo '</ul><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
        } else {
        $post_id = isset($_POST['id']) ? (int) $_POST['id'] : 0;
        if ($post_id > 0) {
            // UPDATE flow (must belong to student)
            $owner_id = mysqli_real_escape_string($con, $s_id);
            $sql = "UPDATE `onpeak_request` SET 
                        `department_id`='$d_id',
                        `contact_no`='$contact_no',
                        `reason`='$reason',
                        `exit_date`='$exit_date',
                        `exit_time`='$exit_time',
                        `return_date`='$return_date',
                        `return_time`='$return_time',
                        `comment`='$comment'
                    WHERE `id`=$post_id AND `student_id`='$owner_id' AND TRIM(LOWER(`onpeak_request_status`)) LIKE 'pending%'";
            if (mysqli_query($con, $sql)) {
                if (mysqli_affected_rows($con) > 0) {
                    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">'
                        . '<strong><h5> Request updated successfully</h5></strong>'
                        . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                        . '<span aria-hidden="true">&times;</span>'
                        . '</button></div>';
                } else {
                    // Distinguish between no-change vs not-pending/unauthorized
                    $chk_sql = "SELECT TRIM(LOWER(onpeak_request_status)) AS st FROM onpeak_request WHERE id=$post_id AND student_id='$owner_id'";
                    $chk_res = mysqli_query($con, $chk_sql);
                    if ($chk_res && mysqli_num_rows($chk_res) === 1) {
                        $st_row = mysqli_fetch_assoc($chk_res);
                        $st = isset($st_row['st']) ? $st_row['st'] : '';
                        if (strpos($st, 'pending') === 0) {
                            echo '<div class="alert alert-info alert-dismissible fade show" role="alert">'
                                . 'No changes detected. The request remains pending.'
                                . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                                . '<span aria-hidden="true">&times;</span>'
                                . '</button></div>';
                        } else {
                            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">'
                                . 'This request is not pending anymore, so it cannot be updated.'
                                . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                                . '<span aria-hidden="true">&times;</span>'
                                . '</button></div>';
                        }
                        mysqli_free_result($chk_res);
                    } else {
                        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">'
                            . 'Record not found or you do not have permission to update it.'
                            . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                            . '<span aria-hidden="true">&times;</span>'
                            . '</button></div>';
                    }
                }
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
                    . htmlspecialchars('Error updating record: ' . mysqli_error($con)) .
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span>'
                    . '</button></div>';
            }
        } else {
            // INSERT flow
            if ($d_id === '' || $d_id === null) {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
                    . 'Cannot determine your Department. Ensure you are actively enrolled in a course.'
                    . '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span>'
                    . '</button></div>';
            } else {
                $status = 'Pending approval';
                $sql = "INSERT INTO `onpeak_request`(
                        `student_id`,`department_id`, `contact_no`, `reason`, `exit_date`, `exit_time`, `return_date`, `return_time`, `comment`, `onpeak_request_status`, `request_date_time`
                    ) VALUES (
                        '$s_id','$d_id','$contact_no','$reason','$exit_date','$exit_time','$return_date','$return_time','$comment', '$status', NOW()
                    )";
                if (mysqli_query($con, $sql)) {
                    if (mysqli_affected_rows($con) > 0) {
                        echo '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><h5> ' . $s_id . '</strong> Request Submitted </h5>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                        </div>    
                        ';
                        // Optional: redirect to avoid duplicate submit and ensure history refresh
                        echo '<script>setTimeout(function(){ window.location = "' . (defined('APP_BASE') ? APP_BASE : '') . '/onpeak/RequestOnPeak.php"; }, 500);</script>';
                    } else {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
                            . 'Insert did not affect any rows. ' . htmlspecialchars(mysqli_error($con)) .
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                            . '<span aria-hidden="true">&times;</span>'
                            . '</button></div>';
                    }
                } else {
                    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
                        . htmlspecialchars('Error inserting record: ' . mysqli_error($con)) .
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                        . '<span aria-hidden="true">&times;</span>'
                        . '</button></div>';
                }
            }
        }
        }
    }
    ?>

<!--Delete Code-->

<?php

    if (isset($_GET['delete'])) {
        $delete_id = isset($_GET['delete']) ? (int) $_GET['delete'] : 0;
        $owner_id = mysqli_real_escape_string($con, $_SESSION['user_name']);
        if ($delete_id > 0) {
            // Only allow delete when pending
            $sql = "DELETE FROM `onpeak_request` WHERE `id` = $delete_id AND `student_id` = '$owner_id' AND TRIM(LOWER(`onpeak_request_status`)) LIKE 'pending%'";
            if (mysqli_query($con, $sql)) {
                if (mysqli_affected_rows($con) > 0) {
                    echo '
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                     <strong> <h5> Record deleted successfully </h5> </strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>    
                    ';
                } else {
                    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">'
                        . 'Record not found, not pending, or you do not have permission to delete it.' .
                        '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                        . '<span aria-hidden="true">&times;</span>'
                        . '</button></div>';
                }
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">'
                    . htmlspecialchars('Error deleting record: ' . mysqli_error($con)) .
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close">'
                    . '<span aria-hidden="true">&times;</span>'
                    . '</button></div>';
            }
        }
    }
    ?>


<!--Form Deign Start-->
<br>
<form method="POST">
    <div class="container my-4">
        <div class="row border border-light shadow p-3 mb-5 bg-white rounded">
            <div class="col">

                <blockquote class="text-center">
                    <h2 class="display-4">On peak Request</h2>
                    <p class="mb-0">Department of Information and Communication Technology</p>
                    <footer class="blockquote-footer">Temporary Exit Application<cite title="Source Title"></cite>
                    </footer>
                </blockquote>
            </div>
        </div>

        <!-- card start here-->

        <div class="border border-light shadow p-3 mb-5 bg-white rounded">
            <br>
            <div class="table container">
                <div class="container">

                    <div class="intro">

                        <br>

                        <div class="form-group">
                            <label for="student_id">Registration No</label>
                            <input class="form-control" id="student_id" name="student_id" type="text"
                                value="<?php if ($_SESSION['user_type'] == 'STU') echo $s_id; ?>" readonly
                                aria-readonly="true" placeholder="Your Registration Number">
                        </div>


                        <div class="form-group">
                            <label for="contact_no">Contact Number</label>
                            <input class="form-control" name="contact_no" type="tel" id="contact_no"
                                placeholder="e.g., 0712345678" value="<?php echo htmlspecialchars($form_contact_no); ?>"
                                required>
                        </div>



                        <div class="form-group">
                            <label for="reason">Reason for Exit</label>
                            <select class="form-control" id="reason" name="reason" required>
                                <option value="" disabled <?php echo $form_reason===''?'selected':''; ?>>Select reason
                                </option>
                                <option value="Hospital" <?php echo ($form_reason==='Hospital')?'selected':''; ?>>
                                    Hospital</option>
                                <option value="Family issues"
                                    <?php echo ($form_reason==='Family issues')?'selected':''; ?>>Family issues</option>
                                <option value="Other Reasons"
                                    <?php echo ($form_reason==='Other Reasons')?'selected':''; ?>>Other Reasons</option>
                            </select>
                        </div>



                        <div class="form-group">
                            <label for="exit_date">Exit Date</label>
                            <input class="form-control" type="date" name="exit_date" id="exit_date"
                                value="<?php echo htmlspecialchars($form_exit_date); ?>" required>
                        </div>


                        <div class="form-group">
                            <label for="exit_time">Exit Time</label>
                            <input class="form-control" type="time" name="exit_time" id="exit_time"
                                value="<?php echo htmlspecialchars($form_exit_time); ?>" required>
                        </div>



                        <div class="form-group">
                            <label for="return_date">Return Date</label>
                            <input class="form-control" type="date" name="return_date" id="return_date"
                                value="<?php echo htmlspecialchars($form_return_date); ?>" required>
                        </div>



                        <div class="form-group">
                            <label for="return_time">Return Time</label>
                            <input class="form-control" type="time" name="return_time" id="return_time"
                                value="<?php echo htmlspecialchars($form_return_time); ?>" required>
                        </div>


                        <div class="form-group">
                            <label for="comment">Comments</label>
                            <textarea class="form-control" name="comment" rows="3" id="comment"
                                placeholder="Comments (optional)"><?php echo htmlspecialchars($form_comment); ?></textarea>
                        </div>

                        <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            var exitDate = document.getElementById('exit_date');
                            var returnDate = document.getElementById('return_date');

                            function syncMinReturnDate() {
                                if (!exitDate || !returnDate) return;
                                var exitVal = exitDate.value;
                                if (exitVal) {
                                    returnDate.min = exitVal; // disable dates before exit date
                                    if (returnDate.value && returnDate.value < exitVal) {
                                        returnDate.value = exitVal; // correct invalid selection
                                    }
                                } else {
                                    returnDate.removeAttribute('min');
                                }
                            }

                            // Apply on load (handles pre-filled values) and when exit date changes
                            syncMinReturnDate();
                            exitDate && exitDate.addEventListener('change', syncMinReturnDate);
                        });
                        </script>




                        <div class=row>
                            <div class="col">
                                <blockquote class="blockquote text-center">
                                    <p class="mb-0">I have read and understand the terms and conditions. I have agreed
                                        by the abide by the rules and regulations of SLGTI.</p>
                                </blockquote>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col">
                                <div class="mx-auto" style="width: 100%">
                                    <?php if ($editing_id > 0) { echo '<input type="hidden" name="id" value="'.(int)$editing_id.'">'; }
                                        ?>
                                    <button type="submit" class="btn btn-primary "
                                        name="<?php echo ($editing_id>0)?'update':'req'; ?>"> <i
                                            class="fab fa-telegram"></i><strong>
                                            <?php echo ($editing_id>0)?'Update Request':'Request to approval'; ?>
                                        </strong></button>
                                    <!-- <input type="submit" name="req" class="btn btn-primary " > -->
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
        </div>

        <div class="border border-light shadow p-3 mb-5 bg-white rounded">
            <div class="col">
                <blockquote class="blockquote text-center">
                    <p class="mb-0">Terms and Conditions of SLGTI </p>
                    <footer class="blockquote-footer">This request must be approved by the HOD and Warden, when students
                        want to exit SLGTI during school hours/ on peak (8.15 am - 4.15 pm) <cite
                            title="Source Title"></cite></footer>
                    <footer class="blockquote-footer">Please note that you fail with in the jurisdiction of the code of
                        conduct and honor for off-campus conduct. <cite title="Source Title"></cite></footer>
                    <footer class="blockquote-footer">Please indicate the reason for your temporary exit in the box
                        above, state the date and seek for approval by your HEAD of the Department (HoD). <cite
                            title="Source Title"></cite></footer>
                </blockquote>
            </div>
        </div>



        <div class="border border-light shadow p-3 mb-5 bg-white rounded">
            <div class="col">
                <div class=row>
                    <div class="col">
                        <br>
                        <br>
                        <div class="pr-5 pl-2 ml-auto text-info"> <strong> History </strong> </div>
                        <br>
                        <br>
                    </div>
                </div>



                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">EXIT DATE</th>
                                        <th scope="col">EXIT TIME</th>
                                        <th scope="col">RETURN DATE </th>
                                        <th scope="col">RETURN TIME</th>
                                        <th scope="col">REASON FOR EXIT</th>
                                        <th scope="col">REFERENCE</th>
                                        <th scope="col">status</th>
                                    </tr>
                                </thead>

                                <?php
                                    $s_id =  $_SESSION['user_name'];
                                    $sql = "SELECT * FROM `onpeak_request` where `student_id`='$s_id'";
                                    $result = mysqli_query($con, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {

                                            $actions = '';
                                            $status_val = strtolower(trim(isset($row["onpeak_request_status"]) ? $row["onpeak_request_status"] : ''));
                                            if (strpos($status_val, 'pending') === 0) {
                                                $actions = '<a class="btn btn-warning" role="button" href="' . (defined('APP_BASE') ? APP_BASE : '') . '/onpeak/RequestOnPeak.php?edit=' . $row["id"] . '">Edit</a>  '
                                                         . '<a class="btn btn-danger" role="button" onclick="return confirm(\'Are you sure you want to delete this request?\');" href="' . (defined('APP_BASE') ? APP_BASE : '') . '/onpeak/RequestOnPeak.php?delete=' . $row["id"] . '">Delete</a>';
                                            } else {
                                                $actions = '<span class="badge badge-secondary">No actions</span>';
                                            }
                                            echo '
                 <tr>
                    <td>' . $row["exit_date"] . '</td>
                    <td>' . $row["exit_time"] . '</td>
                     <td>' . $row["return_date"] . '</td>
                    <td>' . $row["return_time"] . '</td>
                     <td>' . $row["reason"] . '</td>
                     <td> <pre> ' . $row["request_date_time"] . ' </pre> </td>
                    <td>' . $row["onpeak_request_status"] . '</td>
                    <td>' . $actions . '</td>
                 </tr>
                 ';
                                        }
                                    } else {
                                        echo "No more Requests";
                                    }
                                    ?>
                            </table>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>
</form>






<!--END OF YOUR COD-->
<?php } ?>
<!--BLOCK#3 START DON'T CHANGE THE ORDER-->
<?php include_once("../footer.php"); ?>
<!--END DON'T CHANGE THE ORDER-->