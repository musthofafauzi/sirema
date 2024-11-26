<center><h2>Hitung</h2></center>
<?php  
// Database connection
$db_sirema = new mysqli('localhost', 'root', '1', 'sirema');

// Array to store max grades
$maxGrades = [];

// Retrieve max grades for each criterion
for ($i = 1; $i <= 5; $i++) {
    $maxGrades[$i] = $db_sirema->query("SELECT MAX(grade) AS max_grade FROM internship_grade WHERE criteria_id=$i")->fetch_assoc()['max_grade'];
}
?>

<br><br>
<center><h4>Tabel Nilai</h4></center>
<div class="table-responsive">
<table class="table table-striped mb-0">
    <tr>
        <th>Nilai 1</th>
        <th>Nilai 2</th>
        <th>Nilai 3</th>
        <th>Nilai 4</th>
        <th>Nilai 5</th>
    </tr>

<?php  
// Fetch and display grades
$grades = [];
for ($i = 1; $i <= 5; $i++) {
    $grades[$i] = $db_sirema->query("SELECT grade AS nilai FROM internship_grade WHERE criteria_id=$i");
}

while (
    $row1 = $grades[1]->fetch_assoc() and
    $row2 = $grades[2]->fetch_assoc() and
    $row3 = $grades[3]->fetch_assoc() and
    $row4 = $grades[4]->fetch_assoc() and
    $row5 = $grades[5]->fetch_assoc()
) {
    $N = [$row1['nilai'], $row2['nilai'], $row3['nilai'], $row4['nilai'], $row5['nilai']];
    echo "<tr><td>{$N[0]}</td><td>{$N[1]}</td><td>{$N[2]}</td><td>{$N[3]}</td><td>{$N[4]}</td></tr>";
}
?>
</table>
</div>

<br><br>
<center><h4>Tabel Normalisasi</h4></center>
<div class="table-responsive">
<table class="table table-striped mb-0">
    <tr>
        <th>Nilai 1</th>
        <th>Nilai 2</th>
        <th>Nilai 3</th>
        <th>Nilai 4</th>
        <th>Nilai 5</th>
    </tr>

<?php  
// Fetch and normalize grades
for ($i = 1; $i <= 5; $i++) {
    $grades[$i] = $db_sirema->query("SELECT grade AS nilai FROM internship_grade WHERE criteria_id=$i");
}

while (
    $row1 = $grades[1]->fetch_assoc() and
    $row2 = $grades[2]->fetch_assoc() and
    $row3 = $grades[3]->fetch_assoc() and
    $row4 = $grades[4]->fetch_assoc() and
    $row5 = $grades[5]->fetch_assoc()
) {
    $normalized = [
        $row1['nilai'] / $maxGrades[1],
        $row2['nilai'] / $maxGrades[2],
        $row3['nilai'] / $maxGrades[3],
        $row4['nilai'] / $maxGrades[4],
        $row5['nilai'] / $maxGrades[5]
    ];
    echo "<tr><td>{$normalized[0]}</td><td>{$normalized[1]}</td><td>{$normalized[2]}</td><td>{$normalized[3]}</td><td>{$normalized[4]}</td></tr>";
}
?>
</table>
</div>