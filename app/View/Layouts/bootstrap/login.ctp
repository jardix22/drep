<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sign in &middot; Twitter Bootstrap</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->

    <?php echo $this->Html->css('/bootstrap/css/bootstrap'); ?>
    
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    
    <?php echo $this->Html->css('/bootstrap/css/bootstrap-responsive'); ?>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="../assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
  </head>

  <body>

    <div class="container">
      <?php echo $this->fetch('content'); ?>
    </div> <!-- /container -->

    <?php echo $this->element('sql_dump'); ?>
      
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

    <?php echo $this->Html->script('/bootstrap/js/jquery'); ?>
    <?php echo $this->Html->script('/bootstrap/js/bootstrap-transition'); ?>
    <?php echo $this->Html->script('/bootstrap/js/bootstrap-alert'); ?>
    <?php echo $this->Html->script('/bootstrap/js/bootstrap-modal'); ?>
    <?php echo $this->Html->script('/bootstrap/js/bootstrap-dropdown'); ?>
    <?php echo $this->Html->script('/bootstrap/js/bootstrap-scrollspy'); ?>
    <?php echo $this->Html->script('/bootstrap/js/bootstrap-tab'); ?>
    <?php echo $this->Html->script('/bootstrap/js/bootstrap-tooltip'); ?>
    <?php echo $this->Html->script('/bootstrap/js/bootstrap-popover'); ?>
    <?php echo $this->Html->script('/bootstrap/js/bootstrap-button'); ?>
    <?php echo $this->Html->script('/bootstrap/js/bootstrap-collapse'); ?>
    <?php echo $this->Html->script('/bootstrap/js/bootstrap-carousel'); ?>
    <?php echo $this->Html->script('/bootstrap/js/bootstrap-typeahead'); ?>

  </body>
</html>
