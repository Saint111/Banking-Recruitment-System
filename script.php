<?php
/**
 * Created by Charlotte.
 * Project: Banking Recruitment System
 * Date: 1/24/2019
 * Time: 1:49 AM
 */

    if (isset($_GET['Username']) or isset($_GET['Email']) or isset($_GET['Number']) or isset($_GET['Password']))
    {
        echo "<script>$('#check').modal('show')</script>";
    }
    if (isset($_GET['Register']) == 'Success')
    {
        echo "<script>$('#success').modal('show')</script>";
    }
    if (isset($_GET['Login']) == 'Username')
    {
        echo "<script>$('#login').modal('show')</script>";
    }
    if (isset($_GET['Login']) == 'Password')
    {
        echo "<script>$('#login').modal('show')</script>";
    }
    if (isset($_GET['Access']) == 'Success')
    {
        echo "<script>$('#welcome').modal('show')</script>";
    }
    if (isset($_GET['Logout']) == 'Success')
    {
        echo "<script>$('#logout').modal('show')</script>";
    }
    if (isset($_GET['Apply']) == 'Success')
    {
        echo "<script>$('#finish').modal('show')</script>";
    }

    ?>
        <script>

        </script>
    <?php