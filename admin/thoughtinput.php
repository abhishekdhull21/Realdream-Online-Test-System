<?php 
include 'conn.php';
session_start();

$sid = $_SESSION['sid'];
if(!isset($sid))
{
  header('location:index.php');
}
require 'navbar.php'; ?>

<br />
<form method="post" action="insertthought.php">
<textarea name="tho"  cols="30" rows="10"></textarea>
<br />
<br />
<input type="submit" value="Insert Thought" />
</form>
</body>
</html>