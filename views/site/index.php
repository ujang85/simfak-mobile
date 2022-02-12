<?php

use rce\material\widgets\Card;
use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'SIMFAK MOBILE';
?>
<div class="site-index">

    
        <center><h2>SIMFAK-MOBILE</h2>
    </center>
   

    <div class="body-content">

        <div class="row">
            
            <div class="col-lg-3 col-md-4 col-sm-4">
                <?php Card::begin([
                    'header'=>'header-icon',
                    'type'=>'card-stats',
                    'icon'=>'<i class="material-icons">content_copy</i>',
                    'color'=>'danger',
                    'subtitle'=>'<h5><a href="index.php?r=alat-rs/lap_aset_medis">LIST EQUIPMENT </a></h5>',
                    'footer'=>'<div class="stats">
                          </div>',
                ]); Card::end(); ?>
                </div>
            <div class="col-lg-3 col-md-4 col-sm-4">
                <?php Card::begin([
                    'header'=>'header-icon',
                    'type'=>'card-stats',
                    'icon'=>'<i class="material-icons">build</i>',
                    'color'=>'warning',
                    'subtitle'=>'<h5><a href="index.php?r=pm/create">PREVENTIVE MAINTENANCE</a></h5>',
                    'footer'=>'<div class="stats">
                          </div>',
                ]); Card::end(); ?>
            </div>
            
            <div class="col-lg-3 col-md-4 col-sm-4">
                <?php Card::begin([
                    'type'=>'card-stats',
                    'header'=>'header-icon',
                    'icon'=>'<i class="material-icons">settings</i>',
                    'color'=>'info',
                    'subtitle'=>'
                    <h5><a href="javascript:;">PREVENTIVE MAINTENANCE</a></h5>',
                    'footer'=>'<div class="stats">
                          </div>',
                ]); Card::end(); ?>
            </div>
        </div>  

<div class="row">
            
            <div class="col-lg-3 col-md-4 col-sm-4">
                <?php Card::begin([
                    'header'=>'header-icon',
                    'type'=>'card-stats',
                    'icon'=>'<i class="material-icons">assignment</i>',
                    'color'=>'danger',
                    'subtitle'=>'
                    <h5><a href="javascript:;">WORK ORDER</a></h5>',
                    'footer'=>'<div class="stats">
                          </div>',
                ]); Card::end(); ?>
                </div>
            <div class="col-lg-3 col-md-4 col-sm-4">
                <?php Card::begin([
                    'header'=>'header-icon',
                    'type'=>'card-stats',
                    'icon'=>'<i class="fa fa-github"></i>',
                    'color'=>'warning',
                    'subtitle'=>'
                    <h5><a href="javascript:;">ORDER MONITORING</a></h5>',
                    'footer'=>'<div class="stats">
                          </div>',
                ]); Card::end(); ?>
            </div>            
            <div class="col-lg-3 col-md-4 col-sm-4">
                <?php Card::begin([
                    'type'=>'card-stats',
                    'header'=>'header-icon',
                    'icon'=>'<i class="material-icons">assessment</i>',
                    'color'=>'info',
                    'subtitle'=>'
                    <h5><a href="javascript:;">REPORT</a></h5>',
                    'footer'=>'<div class="stats">
                          </div>',
                ]); Card::end(); ?>
            </div>
        </div>  


    </div> 
</div>

