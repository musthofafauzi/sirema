<br>
<center><h2> Kelas </h2></center>

<h4>Daftar Kelas</h4>

<?php  
///tampil data kelas
    $form = _lib('pea',  'internship_class');
    $form->initRoll("WHERE 1 ORDER BY id ASC"); // ORDER BY wajib digunakan demi keamanan

    // $form->roll->setLanguage();
    $form->roll->setSaveTool(true);
    //tampilkan jurusan
    $form->roll->addInput('major_id','sqlplaintext');
    $form->roll->input->major_id->setTitle('Jurusan');
    $form->roll->input->major_id->setDisplayFunction('major_name');
    function major_name($value)
    {
        global $db;
    $q = "SELECT `name` FROM `internship_major` WHERE `id`= $value"; 
    $name = $db->getOne($q);
        // pr('SELECT `name` FROM `internship_major` WHERE `id`= '.$value.'');die;
        return $name;
    };
    //tampilkan nama kelas
    $form->roll->addInput('name','sqlplaintext');
    $form->roll->input->name->setTitle('Kelas');
    // $form->roll->input->name->setLanguage();

    $form->roll->action();
    echo $form->roll->getForm();
    ?>

<br><br>
<h4>Tambahkan kelas</h4>

    <?php 
///input kelas
    $form2 = _lib('pea',  'internship_class');
    $form2->initEdit();
    // $form2->add->setLanguage();

    $form2->edit->addInput( 'major_id', 'selecttable' );
    $form2->edit->input->major_id->setTitle('Jurusan');
    $form2->edit->input->major_id->setReferenceTable('internship_major');
    $form2->edit->input->major_id->setReferenceField( 'name', 'id' );
    $form2->edit->addInput('name','text');
    $form2->edit->input->name->setTitle('Nama kelas ');

    $form2->edit->action();
    echo $form2->edit->getForm(); 
    ?> 





