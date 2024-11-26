<center><h2>Hitung</h2></center>
<?php  
// Koneksi database
$db_sirema = new mysqli('localhost','root', '1', 'sirema');

// Mencari nilai max 
$max1 = $db_sirema->query('SELECT MAX(grade) as max_grade FROM internship_grade WHERE criteria_id=1')->fetch_assoc();
$max2 = $db_sirema->query('SELECT MAX(grade) as max_grade FROM internship_grade WHERE criteria_id=2')->fetch_assoc();
$max3 = $db_sirema->query('SELECT MAX(grade) as max_grade FROM internship_grade WHERE criteria_id=3')->fetch_assoc();
$max4 = $db_sirema->query('SELECT MAX(grade) as max_grade FROM internship_grade WHERE criteria_id=4')->fetch_assoc();
$max5 = $db_sirema->query('SELECT MAX(grade) as max_grade FROM internship_grade WHERE criteria_id=5')->fetch_assoc();
?>

<br><br>
<div class="table-responsive">
    <center><h4>Tabel Nilai</h4></center>
    <table class="table table-striped mb-0">
        <tr>
            <th>Siswa</th>
            <th>Nilai 1</th>
            <th>Nilai 2</th>
            <th>Nilai 3</th>
            <th>Nilai 4</th>
            <th>Nilai 5</th>
        </tr>
        <tr>
            
    <?php  
    // Mengambil nilai berdasarkan criteria id
    $nilai1 = $db_sirema->query('SELECT grade AS nilai1 FROM internship_grade WHERE criteria_id=1');
    $nilai2 = $db_sirema->query('SELECT grade AS nilai2 FROM internship_grade WHERE criteria_id=2');
    $nilai3 = $db_sirema->query('SELECT grade AS nilai3 FROM internship_grade WHERE criteria_id=3');
    $nilai4 = $db_sirema->query('SELECT grade AS nilai4 FROM internship_grade WHERE criteria_id=4');
    $nilai5 = $db_sirema->query('SELECT grade AS nilai5 FROM internship_grade WHERE criteria_id=5');
    $name  = $db_sirema->query('SELECT name FROM internship_student');

    while ($row1 = $nilai1->fetch_assoc() and 
        $row2 = $nilai2->fetch_assoc() and 
        $row3 = $nilai3->fetch_assoc() and  
        $row4 = $nilai4->fetch_assoc() and 
        $row5 = $nilai5->fetch_assoc() and
        $rowName = $name->fetch_assoc()) {

            $N1 = $row1['nilai1'];
            $N2 = $row2['nilai2'];
            $N3 = $row3['nilai3'];
            $N4 = $row4['nilai4'];
            $N5 = $row5['nilai5'];

        echo "<tr>
                <td>{$rowName['name']}</td>
                <td>{$N1}</td>
                <td>{$N2}</td>
                <td>{$N3}</td>
                <td>{$N4}</td>
                <td>{$N5}</td>
                </tr>";
    }
    ?>
    </table>
</div>

<br><br>
<div class="table-responsive">
    <center><h4>Tabel Normalisasi</h4></center>
    <table class="table table-striped mb-0">
        <tr>
            <th>C0</th>
            <th>C1</th>
            <th>C2</th>
            <th>C3</th>
            <th>C4</th>
            <th>C5</th>
        </tr>

    <?php  
    // Inisialisasi array normalisasi
    $normalisasi_A = [];

    // Mengambil nilai berdasarkan criteria id
    $namaS = $db_sirema->query('SELECT id,student_id,criteria_id,grade FROM internship_grade');
    $nilai1 = $db_sirema->query('SELECT grade AS nilai1 FROM internship_grade WHERE criteria_id=1');
    $nilai2 = $db_sirema->query('SELECT grade AS nilai2 FROM internship_grade WHERE criteria_id=2');
    $nilai3 = $db_sirema->query('SELECT grade AS nilai3 FROM internship_grade WHERE criteria_id=3');
    $nilai4 = $db_sirema->query('SELECT grade AS nilai4 FROM internship_grade WHERE criteria_id=4');
    $nilai5 = $db_sirema->query('SELECT grade AS nilai5 FROM internship_grade WHERE criteria_id=5');

    while ($rowS = $namaS->fetch_assoc()  and
        $row1 = $nilai1->fetch_assoc() and 
        $row2 = $nilai2->fetch_assoc() and 
        $row3 = $nilai3->fetch_assoc() and  
        $row4 = $nilai4->fetch_assoc() and 
        $row5 = $nilai5->fetch_assoc()) {

        $nama_siswa = $rowS['id']; 
        $N1 = $row1['nilai1'];
        $N2 = $row2['nilai2'];
        $N3 = $row3['nilai3'];
        $N4 = $row4['nilai4'];
        $N5 = $row5['nilai5'];

        // Normalisasi
        $C0 = $nama_siswa;
        $C1 = $N1 / $max1['max_grade'];
        $C2 = $N2 / $max2['max_grade'];
        $C3 = $N3 / $max3['max_grade'];
        $C4 = $N4 / $max4['max_grade'];
        $C5 = $N5 / $max5['max_grade'];

        // Menyimpan hasil normalisasi ke dalam array
        $normalisasi_A[] = ['C0'=>$C0,'C1' => $C1, 'C2' => $C2, 'C3' => $C3, 'C4' => $C4, 'C5' => $C5];

        // Menampilkan hasil normalisasi dalam tabel
        echo "<tr>
                <td>{$C0}</td>
                <td>{$C1}</td>
                <td>{$C2}</td>
                <td>{$C3}</td>
                <td>{$C4}</td>
                <td>{$C5}</td>
            </tr>";
    } 
    ?>
    </table>
</div>

<?php
// Menampilkan isi array normalisasi
// echo "<pre>";
// print_r($normalisasi_A);
// echo "</pre>";
?>

<br><br>
<center><h4>Tabel Bobot</h4></center>
<div class="table-responsive">
<table class="table table-striped mb-0">
    <tr>
        <th>NO</th>
        <th>Nama TM</th>
        <th>Bobot (kompetensi) 1</th>
        <th>Bobot (kompetensi) 2</th>
        <th>Bobot (kompetensi) 3</th>
        <th>Bobot (kompetensi) 4</th>
        <th>Bobot (kompetensi) 5</th>
    </tr>

<?php  
$bobot_A = [];

// Mendapatkan nilai bobot dari database
$bobot = $db_sirema->query('SELECT internship_bobot.id AS bobot_id, internship_bobot.internship_id, internship_bobot.B1, internship_bobot.B2, internship_bobot.B3, internship_bobot.B4, internship_bobot.B5,
       internship.id AS internship_id, internship.name, internship.address
FROM internship_bobot
LEFT JOIN internship ON internship_bobot.internship_id = internship.id');

if ($bobot) {
    while ($rowB = $bobot->fetch_assoc()) {
        $B0 = $rowB["internship_id"];
        $BN = $rowB["name"];
        $B1 = $rowB["B1"];
        $B2 = $rowB["B2"];
        $B3 = $rowB["B3"];
        $B4 = $rowB["B4"];
        $B5 = $rowB["B5"];

        // Menyimpan bobot ke dalam array
        $bobot_A[] = [
            'B0' => $B0,
            'BN' => $BN,
            'B1' => $B1,
            'B2' => $B2,
            'B3' => $B3,
            'B4' => $B4,
            'B5' => $B5,
        ];

        // Menampilkan bobot dalam tabel
        echo "<tr>
                <td>{$B0}</td>
                <td>{$BN}</td>
                <td>{$B1}</td>
                <td>{$B2}</td>
                <td>{$B3}</td>
                <td>{$B4}</td>
                <td>{$B5}</td>
              </tr>";
    }
} else {
    echo "Error in query: " . $db_sirema->error;
}
?>
</table></div>

<br><br>   
<center><h4>Tabel Hasil Perkalian Normalisasi dan Bobot</h4></center>
<div class="table-responsive">
    <table class="table table-striped mb-0">
        <tr>
            <th>NO</th>
            <th>Nama-TM</th>
            <th>Hasil C1</th>
            <th>Hasil C2</th>
            <th>Hasil C3</th>
            <th>Hasil C4</th>
            <th>Hasil C5</th>
            <th>TOTAL</th></tr>

<?php
$i = 1;
$namaS = $db_sirema->query('  SELECT 
        ig.id AS grade_id,
        ig.student_id,
        isd.name AS student_name,
        ig.criteria_id,
        ig.grade
    FROM 
        internship_grade ig
    JOIN 
        internship_student isd
    ON 
        ig.student_id = isd.id
');
// $nama_siswa = [];
// while ($rowNS = $query->fetch_assoc()) {
//     $nama_siswa[] = $rowNS;
// }

// Loop untuk mengalikan nilai normalisasi dengan bobot
// foreach ($nama_siswa as $rowNS) {
    foreach ($normalisasi_A as $rowNormalisasi) {
        foreach ($bobot_A as $rowBobot) {
            // Menghitung hasil perkalian
            $H1 = $rowNormalisasi['C1'] * $rowBobot['B1'];
            $H2 = $rowNormalisasi['C2'] * $rowBobot['B2'];
            $H3 = $rowNormalisasi['C3'] * $rowBobot['B3'];
            $H4 = $rowNormalisasi['C4'] * $rowBobot['B4'];
            $H5 = $rowNormalisasi['C5'] * $rowBobot['B5'];
     
        // Menampilkan hasil dalam tabel
        echo "<tr>
                <td>{$i}</td>
                <td>{}</td>              
                 <td>{$rowBobot['BN']}</td> 
                <td class='center'>" . number_format($H1, 2, '.', ' ') . "</td>
                        <td class='center'>" . number_format($H2, 2, '.', ' ') . "</td>
                        <td class='center'>" . number_format($H3, 2, '.', ' ') . "</td>
                        <td class='center'>" . number_format($H4, 2, '.', ' ') . "</td>
                        <td class='center'>" . number_format($H5, 2, '.', ' ') . "</td>
                        <td class='center'>" . number_format($H1 + $H2 + $H3 + $H4 + $H5, 2, '.', ' ') . "</td>  
              </tr>";
        $i++;
     
        }
    }
// }
?>
</table>


