<?php
if ($_SESSION['userId']) {
    $username = ($_SESSION['userId']);
}
$query = $conn->query("SELECT `CustomerID`,`PermissionID` FROM customers WHERE CustomerID='$username'");
$row = $query->fetch_assoc();
$permission = $row['PermissionID'];
include('dashboard.php');
include('class/permission.php');
$function = new Permission();
$function = $function->getListFunctionByPermissionID($permission);

foreach ($function as $row) {
    $functionName = new Permission();
    $functionName = $functionName->getFunctionName($row['FunctionID']);
    $functionName = $functionName->fetch_assoc();
?>
    <li class="submenu">
        <a href="index.php?to=<?= $functionName['FunctionID'] ?>" id="menutab<?= $functionName['FunctionID'] ?>">
            <i class="fas fa-cog"></i>
            <span> <?= $functionName['FunctionName'] ?> </span>
        </a>
    </li>
<?php
}
if (isset($_GET['to']))
?>
<script>
    document.getElementById("menutab<?= $_GET['to'] ?>").classList.add("active");
    document.getElementById("menutab0").classList.remove("active");
</script>