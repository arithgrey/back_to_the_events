<!DOCTYPE html>
<html lang="es">


    <head>    
        <title>
            Back to the events - <?=$titulo?>
        </title>        
        <meta http-equiv="Content-type" content="text/html; charset=utf-8">
        <?=$this->load->view("../../../view_tema/header_meta_enid")?>    
        <link rel="stylesheet" href="../css_tema/bootstrap.min.css" />
        <link rel="stylesheet" href="../css_tema/style.css" />
        <link rel="stylesheet" href="../css_tema/demo.css" />
        <link href='../css_tema/font.css' rel='stylesheet' type='text/css'>
        <link href='../css_tema/font2.css' rel='stylesheet' type='text/css'>
        <link href='../css_tema/main.css' rel='stylesheet' type='text/css'>
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <script type="text/javascript" src="../js_tema/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="../js_tema/jquery-migrate-1.2.1.min.js"></script>
        <script type="text/javascript" src="../js_tema/jquery.easing.js"></script>
        <script type="text/javascript" src="../js_tema/jquery.scrollTo.min.js"></script>
        <script type="text/javascript" src="../js_tema/demo.js"></script>        
        <script type="text/javascript" src="../js_tema/js/jquery-1.10.2.min.js"></script>            
        <script type="text/javascript" src="../js_tema/js/bootstrap.min.js"></script>            
        <script type="text/javascript" src="../js_tema/main.js"></script>            




        

    </head>
    <?php 
        if ($in_session ==  1 ) {
            $this->load->view("../../../view_tema/menu_right");
        }
    ?>
    <body>

        
        
        