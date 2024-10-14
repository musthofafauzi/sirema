<center><h2>Jurusan </h2></center>

<h4>Tambahkan jurusan</h4>
    <?php 
    ///input jurusan 
    $form = _lib('pea',  'internship_major');
    $form->initAdd();
    // $form->add->setLanguage();

    $form->add->addInput('name','text');
    $form->add->input->name->setTitle('Nama Jurusan ');

    $form->add->action();
    echo $form->add->getForm(); 
    ?> 

<h4>Daftar jurusan</h4>

    <?php  
    ///tampil data jurusan
    $no = 0;
    $form = _lib('pea',  'internship_major');
    $form->initRoll("WHERE 1 ORDER BY id ASC"); // ORDER BY wajib digunakan demi keamanan

    // $form->roll->setLanguage();
    $form->roll->setSaveTool(true);
    $form->roll->addInput('id','sqlplaintext');
    $form->roll->input->id->setTitle('No');
    $form->roll->input->id->setDisplayFunction('no');
        function no($value)
        {return ($value++);}
    $form->roll->addInput('name','sqlplaintext');
    $form->roll->input->name->setTitle('name');
    // $form->roll->input->name->setLanguage();

    $form->roll->action();
    echo $form->roll->getForm();
    ?>
<br><br>
<center><h2> Kelas </h2></center>

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



<h4>Daftar Kelas</h4>

<?php  
    ///tampil data kelas
    $form = _lib('pea',  'internship_class');
    $form->initRoll("WHERE 1 ORDER BY id DESC"); // ORDER BY wajib digunakan demi keamanan

    // $form->roll->setLanguage();
    $form->roll->setSaveTool(true);

    
    $form->roll->addInput('name','sqlplaintext');
    $form->roll->input->name->setTitle('name');
    // $form->roll->input->name->setLanguage();

    $form->roll->action();
    echo $form->roll->getForm();
    ?>

