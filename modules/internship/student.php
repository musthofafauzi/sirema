<center><h2> Siswa </h2></center>


<h4>Tabel data siswa</h4>
    <?php  
///tampil data siswa
    $form = _lib('pea',  'internship_student');
    $form->initRoll("WHERE 1 ORDER BY id ASC"); // ORDER BY wajib digunakan demi keamanan
    $form->roll->setSaveTool(true);
    //tampil no,nama,nisn
    $form->roll->addInput('id','sqlplaintext');
    $form->roll->input->id->setTitle('No');
    $form->roll->addInput('name','sqlplaintext');
    $form->roll->input->name->setTitle('Nama');
    $form->roll->addInput('nisn','sqlplaintext');
    $form->roll->input->nisn->setTitle('NISN');
    //tampil nama kelas dari tabel kelas
    $form->roll->addInput('class_id','sqlplaintext');
    $form->roll->input->class_id->setTitle('Kelas');
        $form->roll->input->class_id->setDisplayFunction('class_name');
        function class_name($value)
        {
            global $db;
        $q = "SELECT `name` FROM `internship_class` WHERE `id`= $value"; 
        $name = $db->getOne($q);
            return $name;
        };
//tampil nama jurusan dari tabel jurusan
    $form->roll->addInput('major_id','sqlplaintext');
    $form->roll->input->major_id->setTitle('Jurusan');
        $form->roll->input->major_id->setDisplayFunction('major_name');
        function major_name($value)
        {
            global $db;
        $query = "SELECT `name` FROM `internship_major` WHERE `id`= $value"; 
        $name = $db->getOne($query);
            // pr('SELECT `name` FROM `internship_major` WHERE `id`= '.$value.'');die;
            return $name;
        };
    $form->roll->action();
    echo $form->roll->getForm();
    ?>

<h4>Tambahkan Siswa</h4>
    <?php 
    
    $form = _lib('pea',  'internship_student');
 
///input nama siswa
    $form->initEdit();
    $form->edit->addInput('name','text');
    $form->edit->input->name->setTitle('Nama Siswa');
///input nisn
    $form->edit->addInput('nisn','text');
    $form->edit->input->nisn->setTitle('NISN');
///input jurusan
    $form->edit->addInput( 'major_id', 'selecttable' );
    $form->edit->input->major_id->setTitle('Jurusan');
    $form->edit->input->major_id->setReferenceTable('internship_major');
    $form->edit->input->major_id->setReferenceField( 'name', 'id' );
///input kelas
    $form->edit->addInput( 'class_id', 'selecttable' );
    $form->edit->input->class_id->setTitle('Kelas');
    $form->edit->input->class_id->setReferenceTable('internship_class');
    $form->edit->input->class_id->setReferenceField( 'name', 'id' );


    $form->edit->action();
    echo $form->edit->getForm(); 
    ?> 
