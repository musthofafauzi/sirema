<center><h2>Jurusan </h2></center>

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
<h4>Tambahkan jurusan</h4>
    <?php 
///input jurusan 
    $form = _lib('pea',  'internship_major');
    $form->initEdit();
    // $form->edit->setLanguage();

    $form->edit->addInput('name','text');
    $form->edit->input->name->setTitle('Nama Jurusan ');

    $form->edit->action();

    $form->edit->onSave('coba_check');
    echo $form->edit->getForm();

    function coba_check($id)
    {global $form;
        pr("coba");
        die;
    if (empty($id))
    {

        $form->edit->setFailSaveMessage('Maaf, anda tidak nerhasil memasukkan data');
        return false; 
    }
    }
        ?> 

