<?php

$con = mysqli_connect('localhost', 'root', '', 'procyon2022') or die("Could not connect to mysql".mysqli_error($con));


// if($con)
// {
//     echo" connected";
// }
// else
// {
//     echo "not connected";
// }

if(isset($_POST['login']))
{
    $user_name=$_POST['username'];
    // echo $user_name;
    $user_pass=$_POST['password'];
    $category=$_POST['event-category'];

    if($category=='class-event')
    {
        $check_user1="select * from crregistration WHERE username='$user_name'AND password='$user_pass' ";
        $run1=mysqli_query($con,$check_user1);
        $num1 = mysqli_num_rows($run1);
        if(mysqli_num_rows($run1)==1)
        {
          echo "<script>window.open('https://docs.google.com/spreadsheets/d/1NqXqwXTfuSulkDSO88Vaau9jeZX7AWr98rQdpKkzTl8/edit?usp=sharing','_self')</script>";

            $_SESSION['username']=$user_name;//here session is used and value of $user_email store in $_SESSION.

        }
    }
    else if($category=='department-event')
    {
        $query="select * from deptregistrations WHERE username='".$user_name."'AND password='".$user_pass."'";
        $run2=mysqli_query($con,$query);
        if(mysqli_num_rows($run2)==1)
        {
          echo "<script>window.open('https://drive.google.com/file/d/10yT9BA_4uVOOuzh8OtcxWIwqz1uO4hnn/view?usp=sharing','_self')</script>";
           $_SESSION['username']=$user_name;
        }
    }
    else
    {
        echo "<script>alert('Email or password or choice is incorrect!')</script>";
        //echo "Sorry";
    }
}
?>
