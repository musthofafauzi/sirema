
<?php	if ( ! defined('_VALID_BBC')) exit('No direct script access allowed');

// Text yang akan muncul ketika ingin menambah menu public dan memilih module ini di admin panel "Control Panel / Menu Manager"
$sys->set_layout('blank');
switch($Bbc->mod['task'])
{
    case 'main': // Ini adalah task utama ketika user mengakses BaseURL/{namamodule}/ 
        $sys->set_layout('dashboard');
        break;
    case 'list': // Ini akan diakses jika user mengkakses BaseURL/{namamodule}/list/
        # script di sini
        break;
    case 'list_edit':
        # script di sini (karena tidak ada comment setelah case maka opsi tidak akan muncul ketika create/edit menu di "Control Panel / Menu Manager")
        break;
    case 'home':
        include 'home.php';
        break;
    case 'login':
        include 'login.php';
        break;
    case 'dashboard' :
        $sys->set_layout('dashboard');
        break;
    case 'intern_location':
        include 'intern_location.php';
        break;
    case 'criteria':
        include 'criteria.php';
        break ;
    case 'class':
        include 'class.php';
        break ;
    case 'student':
         include 'student.php';
         break ;
    case 'major':
        include 'major.php';
        break ;
    case 'grade':
        include 'grade.php';
        break ;
    case 'grade_view':
        include 'grade_view.php';
         break ;
    case 'weight':
        include 'weight.php';
         break ;
    case 'count':
        include 'count.php';
         break ;
         case 'countt':
            include 'countt.php';
             break ;
    default:
        echo 'Invalid action '.$Bbc->mod['task'].' has been received...';
        break;
}