<center><h2> Siswa </h2></center>

<h4>Tambahkan Siswa</h4>
    <?php 
    
    $form = _lib('pea',  'internship_student');
 
///input nama siswa
    $form->initEdit();
    $form->edit->addInput('name','text');
    $form->edit->input->name->setTitle('Nama Siswa');
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
///input nisn
    $form->edit->addInput('nisn','text');
    $form->edit->input->nisn->setTitle('NISN');

    $form->edit->action();
    echo $form->edit->getForm(); 
    
    ?> 