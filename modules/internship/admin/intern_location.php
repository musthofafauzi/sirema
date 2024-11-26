<!DOCTYPE html>
<h2>Tempat magang</h2>
<br>
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
<h4>Daftar tempat magang</h4>
<?php  
///tampildata tempat magang
$form = _lib('pea',  'internship');
$form->initRoll("WHERE 1 ORDER BY id DESC"); // ORDER BY wajib digunakan demi keamanan

// $form->roll->setLanguage();
$form->roll->setSaveTool(true);

$form->roll->addInput('name','sqlplaintext');
$form->roll->input->name->setTitle('name');
// $form->roll->input->name->setLanguage();

$form->roll->addInput('address','sqlplaintext');
$form->roll->input->address->setTitle('address');
// $form->roll->input->address->setLanguage();

$form->roll->action();
echo $form->roll->getForm();
?>
</html>