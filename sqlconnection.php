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


// Insert into DEPT
echo "<h2>Inserting into DEPT table:</h2>";

$sql = "INSERT INTO DEPT(DEPTNO, DNAME, LOC) VALUES (50, 'HUMAN-RESOURCES', 'LONDON')";
$result = $connection->prepare($sql);
$result->execute();
if ($result) {
	echo "<p>New values inserted into dept table.</p>";
}
else {
	echo "<p>Error inserting new values into dept table.</p>";
} 


// Insert into EMP
echo "<h2>Inserting into EMP table:</h2>";

$sql = "INSERT INTO EMP(EMPNO, ENAME, JOB, MGR, HIREDATE, SAL, COMM, DEPTNO) VALUES (7741, 'JONES', 'SUPERVISOR', 7839, '1985-11-04', 3000.00, NULL, 50)";
$result = $connection->prepare($sql);
$result->execute();
if ($result) {
	echo "<p>New values inserted into emp table.</p>";
}
else {
	echo "<p>Error inserting new values into emp table.</p>";
} 


// Query 1
echo "<h2>Query 1:</h2>";
echo "<h3>Name all employees who work in sales.</h3>";

$query1 = "SELECT ENAME AS name, JOB AS job FROM EMP E INNER JOIN DEPT D ON D.DEPTNO=E.DEPTNO WHERE D.DNAME='SALES'";
$result1 = $connection->prepare($query1);
$result1->execute();
while ($line = $result1->fetch(PDO::FETCH_ASSOC)) {
	echo "<p>" . $line['name'] . " the " . $line['job'] . "</p>";
}


// Query 2
echo "<h2>Query 2:</h2>";
echo "<h3>Show employees' names and employee numbers who have a salary over £2000.</h3>";

$query2 = "SELECT EMPNO AS empno, ENAME AS name, JOB AS job, SAL AS salary FROM EMP WHERE SAL>2000";
$result2 = $connection->prepare($query2);
$result2->execute();
while ($line = $result2->fetch(PDO::FETCH_ASSOC)) {
	echo "<p>" . $line['empno'] . " " . $line['name'] . " the " . $line['job'] . " makes £" . $line['salary'] . "</p>";
}


// Query 3
echo "<h2>Query 3:</h2>";
echo "<h3>How many employees work in the Dallas department?</h3>";

$query3 = "SELECT COUNT(E.ENAME) AS name, D.LOC AS location FROM EMP E INNER JOIN DEPT D ON D.DEPTNO=E.DEPTNO WHERE D.LOC='DALLAS'";
$result3 = $connection->prepare($query3);
$result3->execute();
while ($line = $result3->fetch(PDO::FETCH_ASSOC)) {
	echo "<p>" . $line['name'] . " employees work in " . $line['location'] . "</p>";
}


// Disconnect
$connection=null;  
?>

</body>
</html>