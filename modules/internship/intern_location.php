<center><h2>Tempat magang</h2></center>
<br>
<h4>Daftar tempat magang</h4>
    <?php  
///tampildata tempat magang
    $form = _lib('pea',  'internship');
    $form->initRoll("WHERE 1 ORDER BY id ASC"); // ORDER BY wajib digunakan demi keamanan

    $form->roll->setSaveTool(true);

    $form->roll->addInput('name','sqlplaintext');
    $form->roll->input->name->setTitle('Tempat magang');

    $form->roll->addInput('address','sqlplaintext');
    $form->roll->input->address->setTitle('Alamat');

    $form->roll->addInput('bobot_id', 'sqllinks');
    $form->roll->input->bobot_id->setTitle(lang('List Event'));
    $form->roll->input->bobot_id->setFieldName('id AS bobot_id');
    $form->roll->input->bobot_id->setGetName('id');
    $form->roll->input->bobot_id->setDisplayFunction(function(){return '<span>View</span>';});
    $form->roll->input->bobot_id->setLinks($Bbc->mod['circuit'].'.weight');
    
    $form->roll->action();
    echo $form->roll->getForm();
    ?>
<br><br>    

<h4>Tambah tempat magang</h4>
    <?php 
 ///input data tempat magang 
    $form = _lib('pea',  'internship');
    $form->initAdd();
    $form->add->setLanguage();

    $form->add->addInput('name','text');
    $form->add->input->name->setTitle('Nama Tempat Magang');

    $form->add->addInput('address','text');
    $form->add->input->address->setTitle('Alamat');

    $form->add->action();
    echo $form->add->getForm(); 
    ?>
<br>