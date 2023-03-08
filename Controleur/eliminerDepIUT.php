<?php
    namespace App\Controllers;
    require('../index.php');
    use App\Models\DepIUTModel;
?>
<?php 
    $id = $_GET['Id'];
    $depIUTModel = new DepIUTModel();
    $depIUTModel->delete($id);
    //redirect me to the listerDepIUTs page
    route_to('listerDepIUTs');
    exit();
?>