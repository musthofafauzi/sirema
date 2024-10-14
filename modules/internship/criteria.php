<center><h2>Kriteria bobot </h2></center>

<br>
<h4>Input kriteria</h4>
    <?php 
    ///input kriteria
    $form = _lib('pea',  'internship_criteria');
    $form->initAdd();
    $form->add->setLanguage();

    $form->add->addInput('name','text');
    $form->add->input->name->setTitle('Nama Kriteria');

    $form->add->addInput('code','text');
    $form->add->input->code->setTitle('Kode');
    // $form->add->input->code->setLanguage();

    $form->add->action();
    echo $form->add->getForm(); 
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
