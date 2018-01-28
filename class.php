<?php
require 'config/config.php';
date_default_timezone_set( "Asia/Kuala_Lumpur" );
class db_class
    {
        public $host = db_host;
        public $user = db_user;
        public $pass = db_pass;
        public $dbname = db_name;
        public $db;
        public $error;
        public $errors;
        protected $tblname = 'users';
        protected $tblname_health = 'healthdata';
        public $name;
        public $nickname;
        public $dob;
        public $pob;
        public $gender;
        public $religion;
        public $race;
        public $email;
        public $phone;
        public $username;
        public $address;
        public $postcode;
        public $town;
        public $state;
        public $dates;
        public function __construct( )
            {
                $this->connect();
            }
        private function connect( )
            {
                $this->db = new mysqli( $this->host, $this->user, $this->pass, $this->dbname );
                if ( !$this->db )
                    {
                        $this->error = "Fatal Error: Can't connect to database" . $this->db->connect_error;
                        return false;
                    }
            }
        public function update_user( $loggedin_id, $email, $phone, $nickname, $pob, $address, $postcode, $town, $status, $state )
            {
                $stmt = $this->db->prepare( "UPDATE $this->tblname SET email= ?,phone=?,nickname=?, pob=?, address=?, postcode=?, town=?, state= ?,  status=? WHERE id=?" ) or die( $this->db->error );
                $stmt->bind_param( "ssssssssss", $email, $phone, $nickname, $pob, $address, $postcode, $town, $state, $status, $loggedin_id );
                if ( $stmt->execute() )
                    {
                        $stmt->close();
                        $this->db->close();
                        return true;
                    }
            }
        public function register( $bname, $dob, $bgender, $breligion, $brace, $email, $phone, $username, $password )
            {
                $stmt = $this->db->prepare( "INSERT INTO $this->tblname (bname, dob, bgender, breligion, brace, email, phone, username, password)VALUES(?,?,?,?,?,?,?,?,?)" ) or die( $this->db->error );
                $stmt->bind_param( "sssssssss", $bname, $dob, $bgender, $breligion, $brace, $email, $phone, $username, $password );
                if ( $stmt->execute() )
                    {
                        $stmt->close();
                        $this->db->close();
                        return true;
                    }
            }
        public function record_data( $id, $clinic, $imune_t, $dos, $d_name, $height, $weight, $head_c, $comment, $duration, $date )
            {
                $stmt = $this->db->prepare( "INSERT INTO $this->tblname_health (id, clinic, imune_t, dos, d_name,height, weight, head_c, comment, duration, date)VALUES(?,?,?,?,?,?,?,?,?,?,?)" ) or die( $this->db->error );
                $stmt->bind_param( "issssiiisis", $id, $clinic, $imune_t, $dos, $d_name, $height, $weight, $head_c, $comment, $duration, $date );
                if ( $stmt->execute() )
                    {
                        $stmt->close();
                        $this->db->close();
                        return true;
                    }
            }
        public function reminder( $id, $a_vaccine, $a_dos, $a_date, $a_duration, $a_email, $a_phone )
            {
                $stmt = $this->db->prepare( "UPDATE $this->tblname_health SET a_vaccine= ?,a_dos=?,a_date=?,a_duration=?, a_email=?, a_phone=? WHERE id=? ORDER BY h_id DESC LIMIT 1" ) or die( $this->db->error );
                $stmt->bind_param( "sssissi", $a_vaccine, $a_dos, $a_date, $a_duration, $a_email, $a_phone, $id );
                if ( $stmt->execute() )
                    {
                        $stmt->close();
                        $this->db->close();
                        return true;
                    }
            }
        public function listboard( )
            {
                $sql = "select * from $this->tblname WHERE role = ?";
                if ( $query = $this->db->prepare( $sql ) )
                    {
                        $query->bind_param( 's', $user );
                        $user = 'user';
                        $query->execute();
                    }
                else
                    {
                        $error = $db->errno . ' ' . $db->error;
                        echo $error;
                    }
                $result = $query->get_result();
                echo "<thead><th>NO</th><th>Name</th><th>Mykid Num</th><th>Data</th></thead>";
                if ( $result->num_rows > 0 )
                    {
                        echo "<tbody>";
                        $counter = 1;
                        while ( list( $id, $bname, $dob, $bgender, $breligion, $brace, $email, $phone, $username ) = $result->fetch_row() )
                            {
                                echo "<tr><td>$counter</td><td>$bname</td><td>$username</td><td>";
                                echo '<a href="viewrecord.php?id=' . $id . '" target="_blank">View Data</a></td>';
                                echo "";
                                $counter++;
                            }
                        echo "</tr></tbody>";
                    }
            }
        public function record_user( $loggedin_id )
            {
                $sql = "SELECT `clinic`,`imune_t`,`dos`,`date`,`d_name`,`comment` FROM $this->tblname_health WHERE id = ?";
                if ( $query = $this->db->prepare( $sql ) )
                    {
                        $query->bind_param( 's', $loggedin_id );
                        $query->execute();
                    }
                else
                    {
                        $error = $db->errno . ' ' . $db->error;
                        echo $error;
                    }
                $result = $query->get_result();
                echo "<thead><th>NO</th><th>Clinic</th><th>Vaccine</th><th>Dose</th><th>Date</th><th>Comments</th><th>Doc Name</th></thead>";
                if ( $result->num_rows > 0 )
                    {
                        echo "<tbody>";
                        $counter = 1;
                        while ( list( $clinic, $imune_t, $dos, $date, $d_name, $comment ) = $result->fetch_row() )
                            {
                                $dates = date( 'd-m-Y', strtotime( $date ) );
                                echo "<tr><td>$counter</td><td>$clinic</td><td>$imune_t</td><td>$dos</td><td>$dates</td><td>$comment</td><td>$d_name</td>";
                                $counter++;
                            }
                        echo "</tr></tbody>";
                    }
            }
        public function appoinment( $loggedin_id )
            {
                $sql = "SELECT `a_vaccine`, `a_date`, `a_remark` FROM $this->tblname_health WHERE id = ?";
                if ( $query = $this->db->prepare( $sql ) )
                    {
                        $query->bind_param( 's', $loggedin_id );
                        $query->execute();
                    }
                else
                    {
                        $error = $this->db->errno . ' ' . $this->db->error;
                        echo $error;
                    }
                $result = $query->get_result();
                echo "<thead><th>NO</th><th>Next Vaccine</th><th>Appoinment's Date</th><th>Remark</th></thead>";
                if ( $result->num_rows > 0 )
                    {
                        echo "<tbody>";
                        $counter = 1;
                        while ( list( $a_vaccine, $a_date, $a_remark ) = $result->fetch_row() )
                            {
                                $date = date( 'd-m-Y', strtotime( $a_date ) );
                                echo "<tr><td>$counter</td><td>$a_vaccine</td><td>$date</td><td>$a_remark</td>";
                                $counter++;
                            }
                        echo "</tr></tbody>";
                    }
            }
        public function measurement( $loggedin_id, $measurement )
            {
                if ( $measurement == 'Weight' )
                    {
                        $sql = "SELECT `clinic`,`date`,`weight`";
                    }
                elseif ( $measurement == 'Height' )
                    {
                        $sql = "SELECT `clinic`,`date`,`height`";
                    }
                else
                    {
                        $sql = "SELECT `clinic`,`date`,`head_c`";
                    }
                $sql .= "FROM $this->tblname_health WHERE id = ?";
                if ( $query = $this->db->prepare( $sql ) )
                    {
                        $query->bind_param( 's', $loggedin_id );
                        $query->execute();
                    }
                else
                    {
                        $error = $db->errno . ' ' . $db->error;
                        echo $error;
                    }
                $result = $query->get_result();
                echo "<thead><th>NO</th><th>Date</th><th>$measurement</th></thead>";
                if ( $result->num_rows > 0 )
                    {
                        echo "<tbody>";
                        $counter = 1;
                        while ( list( $clinic, $date, $weight ) = $result->fetch_row() )
                            {
                                echo "<tr><td>$counter</td><td>$date</td><td>$weight</td>";
                                $counter++;
                            }
                        echo "</tr></tbody>";
                    }
            }
        public function users_info( $loggedin_id )
            {
                $sql = "SELECT * FROM $this->tblname WHERE id = ?";
                if ( $query = $this->db->prepare( $sql ) )
                    {
                        $query->bind_param( 's', $loggedin_id );
                        $query->execute();
                    }
                else
                    {
                        $error = $this->db->errno . ' ' . $this->db->error;
                        echo $error;
                    }
                $result = $query->get_result();
                while ( $rows = $result->fetch_assoc() )
                    {
                        $this->name     = $rows[ 'bname' ];
                        $this->nickname = $rows[ 'nickname' ];
                        $this->dob      = $rows[ 'dob' ];
                        $this->pob      = $rows[ 'pob' ];
                        $this->gender   = $rows[ 'bgender' ];
                        $this->religion = $rows[ 'breligion' ];
                        $this->race     = $rows[ 'brace' ];
                        $this->email    = $rows[ 'email' ];
                        $this->phone    = $rows[ 'phone' ];
                        $this->username = $rows[ 'username' ];
                        $this->address  = $rows[ 'address' ];
                        $this->postcode = $rows[ 'postcode' ];
                        $this->town     = $rows[ 'town' ];
                        $this->state    = $rows[ 'state' ];
                        $this->id       = $rows[ 'id' ];
                        $this->status   = $rows[ 'status' ];
                        $this->n_img    = $rows[ 'profile_image' ];
                    }
            }
        public function health_info( $loggedin_id )
            {
                $sql = "SELECT * FROM $this->tblname_health WHERE id = ?";
                if ( $query = $this->db->prepare( $sql ) )
                    {
                        $query->bind_param( 's', $loggedin_id );
                        $query->execute();
                    }
                else
                    {
                        $error = $this->db->errno . ' ' . $this->db->error;
                        echo $error;
                    }
                $result = $query->get_result();
                while ( $rows = $result->fetch_assoc() )
                    {
                        $this->dates = $rows[ 'date' ];
                    }
            }
    }
?>