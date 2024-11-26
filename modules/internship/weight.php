<center><h2>Kriteria bobot </h2></center>

<br>
<h4>Bobot</h4>
    <?php 
    // $id = $_GET["id"];
    if (!empty($_GET["id"])) {
        $id = $_GET["id"];
    }  else {
        $id = 0;
    }
    pr($id);
    
///input bobot

    $form = _lib('pea',  'internship_bobot');
    
    $form->initEdit(!empty($id)? 'WHERE internship_id ='.$id :'');
    $form->edit->setLanguage();

    $form->edit->addInput('internship_id','text') ;

    $form->edit->addInput('B1','text');
    $form->edit->input->B1->setTitle('Sistem Komputer');

    $form->edit->addInput('B2','text');
    $form->edit->input->B2->setTitle('Komputer dan jaringan dasar');

    $form->edit->addInput('B3','text');
    $form->edit->input->B3->setTitle('Dasar desain grafis');

    $form->edit->addInput('B4','text');
    $form->edit->input->B4->setTitle('Pemrograman Berorientasi Objek ');

    $form->edit->addInput('B5','text');
    $form->edit->input->B5->setTitle('Pemrograman Web');

    $form->edit->action();
    echo $form->edit->getForm(); 
    ?> 
<br><br>
<h4>Daftar Kriteria mata pelajaran</h4>

    <?php  
    ///tampil data kriteria
    $form = _lib('pea',  'internship_criteria');
    $form->initRoll("WHERE 1 ORDER BY id DESC"); // ORDER BY wajib digunakan demi keamanan

    // $form->roll->setLanguage();
    $form->roll->setSaveTool(true);

    $form->roll->addInput('name','sqlplaintext');
    $form->roll->input->name->setTitle('name');
    // $form->roll->input->name->setLanguage();

    $form->roll->addInput('code','sqlplaintext');
    $form->roll->input->code->setTitle('code');
    // $form->roll->input->code->setLanguage();

    $form->roll->action();
    echo $form->roll->getForm();
?>
