<?php
require_once "class.php";
$register = new db_class();
if ( isset( $_POST[ 'submitregister' ] ) ) {
        $bname     = $_POST[ 'bname' ];
        $dob       = $_POST[ 'dob' ];
        $bgender   = $_POST[ 'bgender' ];
        $breligion = $_POST[ 'breligion' ];
        $brace     = $_POST[ 'brace' ];
        $email     = $_POST[ 'email' ];
        $phone     = $_POST[ 'phone' ];
        $username  = $_POST[ 'username' ];
        $password  = $_POST[ 'password' ];
        $register->register( $bname, $dob, $bgender, $breligion, $brace, $email, $phone, $username, $password );
        if ( $register ) {
                echo "<script type= 'text/javascript'>alert('You Have Successfully Registered');</script>";
                echo '<script>window.location= "index.php"</script>';
        } else {
                echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
        }
} elseif ( isset( $_POST[ 'update' ] ) ) {
        $loggedin_id = $_POST[ 'id' ];
        $email       = $_POST[ 'email' ];
        $phone       = $_POST[ 'phone' ];
        $nickname    = $_POST[ 'nickname' ];
        $pob         = $_POST[ 'pob' ];
        $address     = $_POST[ 'address' ];
        $postcode    = $_POST[ 'postcode' ];
        $town        = $_POST[ 'town' ];
        $status      = $_POST[ 'status' ];
        $state       = $_POST[ 'state' ];
        $register->update_user( $loggedin_id, $email, $phone, $nickname, $pob, $address, $postcode, $town, $status, $state );
        if ( $register ) {
                echo "<script type= 'text/javascript'>alert('Your data Successfully updated');</script>";
                echo '<script>window.location= "user/userupdate.php"</script>';
        } else {
                echo "<script type= 'text/javascript'>alert('Data not successfully updated.');</script>";
        }
} elseif ( isset( $_POST[ 'recorddata' ] ) ) {
        $id              = $_POST[ 'id' ];
        $clinic          = $_POST[ 'clinic' ];
        $imune_t         = $_POST[ 'imune_t' ];
        $dos             = $_POST[ 'dos' ];
        $d_name          = $_POST[ 'd_name' ];
        $height          = $_POST[ 'height' ];
        $weight          = $_POST[ 'weight' ];
        $head_c          = $_POST[ 'head_c' ];
        $comment         = $_POST[ 'comment' ];
        $duration        = $_POST[ 'total' ];
        $date            = date( "Y-m-d" );
        $_POST[ 'date' ] = $date;
        $register->record_data( $id, $clinic, $imune_t, $dos, $d_name, $height, $weight, $head_c, $comment, $duration, $date );
        if ( $register ) {
?>
   <script>
        alert(" records was inserted, Please add Reminder !!!");
        window.location.href='admin/reminder.php?id=<?php echo $id;?>';
        </script>
    <?php
        } else {
                echo "<script type= 'text/javascript'>alert('Data not successfully updated.');</script>";
        }
} elseif ( isset( $_POST[ 'updatereminder' ] ) ) {
        $id         = $_POST[ 'id' ];
        $a_vaccine  = $_POST[ 'a_vaccine' ];
        $a_dos      = $_POST[ 'a_dos' ];
        $a_date     = $_POST[ 'd2' ];
        $a_duration = $_POST[ 'a_duration' ];
        $a_email    = $_POST[ 'a_email' ];
        $a_phone    = $_POST[ 'a_phone' ];
        $register->reminder( $id, $a_vaccine, $a_dos, $a_date, $a_duration, $a_email, $a_phone );
        if ( $register ) {
                echo "<script type=\"text/javascript\">" . "alert('Reminder successfully updated');" . "</script>";
                echo "<script>window.close();</script>";
        } else {
                echo "<script type= 'text/javascript'>alert('Data not successfully updated.');</script>";
        }
}
$errors   = array(
        1 => "<h4>Invalid user name or password, Try again</h4>",
        2 => "<h4>Please login to access this area</h4>" );
$error_id = isset( $_GET[ 'err' ] ) ? (int) $_GET[ 'err' ] : 0;
if ( $error_id == 1 ) {
        echo '<p class="text-danger">' . $errors[ $error_id ] . '</p>';
} elseif ( $error_id == 2 ) {
        echo '<p class="text-danger">' . $errors[ $error_id ] . '</p>';
}
?>