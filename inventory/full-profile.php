<?php
session_start();

// Database configuration
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "";
$mysql_database = "hostel";

// Create connection using mysqli
$mysqli = new mysqli($mysql_hostname, $mysql_user, $mysql_password, $mysql_database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Get student email from query string
$emailid = $mysqli->real_escape_string($_GET['id']);

// Prepare and execute query
$stmt = $mysqli->prepare("SELECT * FROM registration WHERE emailid = ?");
$stmt->bind_param("s", $emailid);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Student Information</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="hostel.css" rel="stylesheet" type="text/css">
    <script language="javascript" type="text/javascript">
        function f2() {
            window.close();
        }
        function f3() {
            window.print(); 
        }
    </script>
</head>
<body>
    <table width="100%" border="0">
        <?php while ($row = $result->fetch_assoc()) { ?>
        <tr>
            <td colspan="2" align="center" class="font1">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" align="center" class="font1">&nbsp;</td>
        </tr>
        <tr>
            <td colspan="2" class="font">
                <?php echo ucfirst($row['firstName']) . ' ' . ucfirst($row['lastName']) . "'S "; ?>
                <span class="font1">information &raquo;</span>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="font">
                <div align="right">Reg Date: <span class="comb-value"><?php echo $row['postingDate']; ?></span></div>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="heading" style="color: red;">Room Related Info &raquo;</td>
        </tr>
        <tr>
            <td colspan="2" class="font1">
                <table width="100%" border="0">
                    <tr>
                        <td width="32%" valign="top" class="heading">Room no:</td>
                        <td class="comb-value1"><?php echo $row['roomno']; ?></td>
                    </tr>
                    <tr>
                        <td width="22%" valign="top" class="heading">Seater:</td>
                        <td class="comb-value1"><?php echo $row['seater']; ?></td>
                    </tr>
                    <tr>
                        <td width="12%" valign="top" class="heading">Fees PM:</td>
                        <td class="comb-value1"><?php echo $fpm = $row['feespm']; ?></td>
                    </tr>
                    <tr>
                        <td width="12%" valign="top" class="heading">Food Status:</td>
                        <td class="comb-value1"><?php echo $row['foodstatus'] == 0 ? "Without Food" : "With Food"; ?></td>
                    </tr>
                    <tr>
                        <td width="12%" valign="top" class="heading">Staying From:</td>
                        <td class="comb-value1"><?php echo $row['stayfrom']; ?></td>
                    </tr>
                    <tr>
                        <td width="12%" valign="top" class="heading">Duration:</td>
                        <td class="comb-value1"><?php echo $dr = $row['duration']; ?></td>
                    </tr>
                    <tr>
                        <td width="12%" valign="top" class="heading">Total Fee:</td>
                        <td class="comb-value1">
                            <?php
                            $fd = $row['foodstatus'] == 1 ? 2000 : 0;
                            echo ($dr * $fpm) + $fd;
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" class="heading" style="color: red;">Personal Info &raquo;</td>
                    </tr>
                    <tr>
                        <td width="12%" valign="top" class="heading">Course:</td>
                        <td class="comb-value1"><?php echo $row['course']; ?></td>
                    </tr>
                    <tr>
                        <td width="12%" valign="top" class="heading">Reg no:</td>
                        <td class="comb-value1"><?php echo $row['regno']; ?></td>
                    </tr>
                    <tr>
                        <td width="12%" valign="top" class="heading">First Name:</td>
                        <td class="comb-value1"><?php echo $row['firstName']; ?></td>
                    </tr>
                    <tr>
                        <td width="12%" valign="top" class="heading">Middle name:</td>
                        <td class="comb-value1"><?php echo $row['middleName']; ?></td>
                    </tr>
                    <tr>
                        <td width="12%" valign="top" class="heading">Last:</td>
                        <td class="comb-value1"><?php echo $row['lastName']; ?></td>
                    </tr>
                    <tr>
                        <td width="12%" valign="top" class="heading">Gender:</td>
                        <td class="comb-value1"><?php echo $row['gender']; ?></td>
                    </tr>
                    <tr>
                        <td width="12%" valign="top" class="heading">Contact No:</td>
                        <td class="comb-value1"><?php echo $row['contactno']; ?></td>
                    </tr>
                    <tr>
                        <td width="12%" valign="top" class="heading">Email id:</td>
                        <td class="comb-value1"><?php echo $row['emailid']; ?></td>
                    </tr>
                    <tr>
                        <td width="12%" valign="top" class="heading">Emergency Contact:</td>
                        <td class="comb-value1"><?php echo $row['egcontactno']; ?></td>
                    </tr>
                    <tr>
                        <td width="12%" valign="top" class="heading">Guardian Name:</td>
                        <td class="comb-value1"><?php echo $row['guardianName']; ?></td>
                    </tr>
                    <tr>
                        <td width="12%" valign="top" class="heading">Guardian Relation:</td>
                        <td class="comb-value1"><?php echo $row['guardianRelation']; ?></td>
                    </tr>
                    <tr>
                        <td width="12%" valign="top" class="heading">Guardian Contact:</td>
                        <td class="comb-value1"><?php echo $row['guardianContactno']; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="heading" style="color: red;">Correspondence Address &raquo;</td>
                    </tr>
                    <tr>
                        <td width="12%" valign="top" class="heading">Address:</td>
                        <td class="comb-value1"><?php echo $row['corresAddress']; ?></td>
                    </tr>
                    <tr>
                        <td width="12%" valign="top" class="heading">City:</td>
                        <td class="comb-value1"><?php echo $row['corresCity']; ?></td>
                    </tr>
                    <tr>
                        <td width="12%" valign="top" class="heading">State:</td>
                        <td class="comb-value1"><?php echo $row['corresState']; ?></td>
                    </tr>
                    <tr>
                        <td width="12%" valign="top" class="heading">Pincode:</td>
                        <td class="comb-value1"><?php echo $row['corresPincode']; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" class="heading" style="color: red;">Permanent Address &raquo;</td>
                    </tr>
                    <tr>
                        <td width="12%" valign="top" class="heading">Address:</td>
                        <td class="comb-value1"><?php echo $row['pmntAddress']; ?></td>
                    </tr>
                    <tr>
                        <td width="12%" valign="top" class="heading">City:</td>
                        <td class="comb-value1"><?php echo $row['pmntCity']; ?></td>
                    </tr>
                    <tr>
                        <td width="12%" valign="top" class="heading">State:</td>
                        <td class="comb-value1"><?php echo $row['pmntState']; ?></td>
                    </tr>
                    <tr>
                        <td width="12%" valign="top" class="heading">Pincode:</td>
                        <td class="comb-value1"><?php echo $row['pmntPincode']; ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="2" align="right">
                <form id="form1" name="form1" method="post" action="">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="14%">&nbsp;</td>
                            <td width="35%" class="comb-value">
                                <label>
                                    <input name="Submit" type="button" class="txtbox4" value="Print this Document" onclick="f3();" />
                                </label>
                            </td>
                            <td width="3%">&nbsp;</td>
                            <td width="26%">
                                <label>
                                    <input name="Submit2" type="button" class="txtbox4" value="Close this Document" onclick="f2();" />
                                </label>
                            </td>
                            <td width="8%">&nbsp;</td>
                            <td width="14%">&nbsp;</td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
        </tr>
    </table>
</body>
</html>

<?php
// Close the statement and connection
$stmt->close();
$mysqli->close();
?>
