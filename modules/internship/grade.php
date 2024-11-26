
    <?php  
///tampil data nilai siswa
    $form = _lib('pea',  'internship_grade');
    $form->initRoll("WHERE 1 ORDER BY id ASC"); // ORDER BY wajib digunakan demi keamanan

    $form->roll->setSaveTool(true);
//tampil data siswa dari tabel siswa
    $form->roll->addInput('student_id','sqlplaintext');
    $form->roll->input->student_id->setTitle('Siswa');
        $form->roll->input->student_id->setDisplayFunction('student_name');
        function student_name($value)
        {
            global $db;
        $q = "SELECT `name` FROM `internship_student` WHERE `id`= $value"; 
        $name = $db->getOne($q);
            return '<a href="grade_view?id=$value">'.$name.'</a>';
        };
///tampil data mata pelajaran dari tabel criteria
    $form->roll->addInput('criteria_id','sqlplaintext');
    $form->roll->input->criteria_id->setTitle('Mata Pelajaran');
        $form->roll->input->criteria_id->setDisplayFunction('criteria_name');
        function criteria_name($value)
        {
        global $db;
        $q = "SELECT `name` FROM `internship_criteria` WHERE `id`= $value"; 
        $name = $db->getOne($q);
        return $name;
        };    
        
    $form->roll->addInput('grade','sqlplaintext');
    $form->roll->input->grade->setTitle('Nilai');
      
    $form->roll->action();
    echo $form->roll->getForm();
    ?>

<h4>Tambahkan Nilai</h4>
    <?php  
    $form = _lib('pea',  'internship_grade');
    $form->initAdd("WHERE 1 ORDER BY id ASC");
    $form->add->setSaveTool(true); 

    $form->add->addInput( 'student_id', 'selecttable' );
    $form->add->input->student_id->setTitle('Nama Siswa');
    $form->add->input->student_id->setReferenceTable('internship_student');
    $form->add->input->student_id->setReferenceField( 'name', 'id' );

    $form->add->addInput( 'criteria_id', 'selecttable' );
    $form->add->input->criteria_id->setTitle('Mata Pelajaran');
    $form->add->input->criteria_id->setReferenceTable('internship_criteria');
    $form->add->input->criteria_id->setReferenceField( 'name', 'id' );

    $form->add->addInput('grade','text');
    $form->add->input->grade->setTitle('Nilai');

    $form->add->action();
    echo $form->add->getForm();
    ?>