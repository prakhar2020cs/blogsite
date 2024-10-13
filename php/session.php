<?php
session_name($_GET['email']);
session_start();
echo "$_SESSION[email]";