<?

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : null;
$method = isset($_POST['submit']) ? 'POST' : 'GET';

switch ($action . '_' . $method) {
	case 'create_GET':
		include __DIR__ . "/../Views/food/edit.php";
		break;
	case 'create_POST':
		//	Proccess input
		break;
	case 'edit_GET':
		include __DIR__ . "/../Views/food/edit.php";		
		break;
	case 'edit_POST':
		//	Proccess input
		break;
	case 'delete_GET':
		include __DIR__ . "/../Views/food/delete.php";		
		break;
	case 'delete_POST':
		//	Proccess input
		break;
	case 'index_GET':
	default:
		include __DIR__ . "/../Views/food/index.php";		
		break;
}
