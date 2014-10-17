<!DOCTYPE html>
<html>
<head>   
<title><?php echo $title; ?></title>
<link href="<?php echo assets_url(); ?>styles/layouts.css" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="wrapper">
        <div class="header">
            <h1>Cropedia - Your farming power</h1>
            <div class="navigation">
                <ul><li><?php echo anchor('/',"Home",array("class"=>$class['welcome'])); ?></li><li><?php echo anchor('crops',"Crops",array("class"=>$class['crops'])); ?></li><li><?php echo anchor('diseases',"Diseases",array("class"=>$class['diseases'])); ?></li></ul>
            </div>
        </div>
        
        <div class="container">
   
