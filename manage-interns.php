<?php
include_once('config.php');
// session_start();
error_reporting(0);
$link='emailsender.php';
include('config.php');
include('checklogin.php');
check_login();
$message="";
if(isset($_GET['decision']))
{
    if($_GET['decision']=='selected')
    {
        $message='You have been selected ';
        $query=mysqli_query($con,"UPDATE interns SET decision=1 WHERE id=".$_GET['id']);
    }
    if($_GET['decision']=='rejected')
    {
        $message='You have been rejected';
        $query=mysqli_query($con,"UPDATE interns SET decision=0 WHERE id=".$_GET['id']);
    }
    include('emailsender.php');
}
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Admin | Manage Interns</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style3.css">
    
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

</head>

<body>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar  navbar-light " style="background-color: #7386D5; ">
                <div class="container-fluid">

                    <!-- <button type="button" id="sidebarCollapse" class="btn btn-info" style="background-color: #c82333; ">
                        <i class="fas fa-align-left"></i>
                        <span></span>
                    </button> -->
                    <span class="navbar-brand mb-0 h1 ">Interns Management Portal</span>
                    <div class="dropdown " style="margin-right:40px">
                        <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"  >
                           <img src="https://img.icons8.com/ios-filled/20/000000/gender-neutral-user.png"/> <span style="padding-right:20px"> Admin </span>   
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="padding-right:50px">
                          <a class="dropdown-item" href="change-password.php">Change Password</a>
                         <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </div>

                    
                </div>
            </nav>

            <!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
						

                        <div class="row">
                    <div class="col-md-12">
                        <h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Interns</span></h5>
                        <p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
                    <?php echo htmlentities($_SESSION['msg']="");?></p>	
                        <table class="table table-hover" id="sample-table-1">
                            <thead>
                                <tr>
                                    <th class="center">#</th>
                                    <th>Full Name</th>
                                    <th class="hidden-xs">Adress</th>
                                    <th>Age</th>
                                    <th>Gender </th>
                                    <th>Email </th>
                                    <th>Phone no</th>
                                    <th>Date of Birth</th>
                                    <th>Resume</th>
                                    <th>Select</th>
                                    <th>Reject</th>
                                </tr>
                            </thead>
                           <tbody>
                                       <?php
                                       $sql=mysqli_query($con,"select * from interns");
                                        $cnt=1;
                                       while($row=mysqli_fetch_array($sql))
                                        {
                                         ?>

                                <tr>
                                    <td class="center"><?php echo $cnt;?>.</td>
                                    <td class="hidden-xs"><?php echo $row['name'];?></td>
                                    <td><?php echo $row['addr'];?></td>
                                    <td><?php echo $row['age'];?>
                                    </td>
                                    <td><?php echo $row['gender'];?></td>
                                    <td><?php echo $row['email'];?></td>
                                    <td><?php echo $row['ph'];?></td>
                                    <td><?php echo $row['dob'];?></td>
                                    <td><a href='<?php echo "/contactform/upload/".$row['resumepdf']; ?>' download>Download</a></td>
                                    <td>
                                    <div class="visible-md visible-lg hidden-sm hidden-xs">
                
                                    <a href="manage-interns.php?decision=selected&id=<?php echo $row['id'];?>" 
                                    onClick="return confirm('Select')"class="btn btn-transparent btn-xs tooltips"
                                     tooltip-placement="top" tooltip="Remove">
                                     <img src="img/cursor.png"></a>
                                    </div>
                                        </td>
                                        <td>
                                        <div class="visible-md visible-lg hidden-sm hidden-xs">  
                                    <a href="manage-interns.php?decision=rejected&id=<?php echo $row['id'];?>" 
                                    onClick="return confirm('Reject')"class="btn btn-transparent btn-xs tooltips"
                                     tooltip-placement="top" tooltip="Remove">
                                    <img src="img/close.png"></a>
                                      </div>
                                        </td>
                                </tr>
                                
                                <?php 
                                $cnt=$cnt+1;
                                // echo $message;
                                 }?>
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
                    </div>
                </div>
            </div>
            <!-- end: BASIC EXAMPLE -->

            
        
        </div>
    </div>

    <div class="overlay"></div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
</body>

</html>