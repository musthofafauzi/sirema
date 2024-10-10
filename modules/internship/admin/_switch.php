
<?php	if ( ! defined('_VALID_BBC')) exit('No direct script access allowed');

// Text yang akan muncul ketika ingin menambah menu public dan memilih module ini di admin panel "Control Panel / Menu Manager"
switch($Bbc->mod['task'])
{
    case 'main': // Ini adalah task utama ketika user mengakses BaseURL/{namamodule}/ 
        # script di sini
        break;
    case 'list': // Ini akan diakses jika user mengkakses BaseURL/{namamodule}/list/
        # script di sini
        break;
    case 'list_edit':
        # script di sini (karena tidak ada comment setelah case maka opsi tidak akan muncul ketika create/edit menu di "Control Panel / Menu Manager")
        break;
        case 'intern_location':
        include 'intern_location.php';
        break ;

    default:
        echo 'Invalid action '.$Bbc->mod['task'].' has been received...';
        break;
}