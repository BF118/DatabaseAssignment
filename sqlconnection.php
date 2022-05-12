<html>

<body>

<h1>Connection to SQL DB</h1>

<?php

// Set database properties
$dsn = 'mysql:host=localhost;dbname=assignment-db';
$user = 'root';
$pass = '';

// Create connection
$connection = new PDO($dsn, $user, $pass);

// Insert to DEPT
$sql = "INSERT INTO DEPT(DEPTNO, DNAME, LOC) VALUES (50, 'HUMAN-RESOURCES', 'LONDON')";
$result = $connection->prepare($sql);
$result->execute();
if ($result) {
	echo "New values inserted into dept";
}
else {
	echo "Error inserting new values into dept";
}

// Insert to EMP
$sql = "INSERT INTO EMP(EMPNO, ENAME, JOB, MGR, HIREDATE, SAL, COMM, DEPTNO) VALUES (7741, 'JONES', 'SUPERVISOR', 7839, '1985-11-04', 3000.00, NULL, 50)";
$result = $connection->prepare($sql);
$result->execute();
if ($result) {
	echo "New values inserted into emp";
}
else {
	echo "Error inserting new values into emp";
}

// Query 1

// Query 2

// Query 3

// Disconnect
$connection=null;  
?>

</body>
</html>