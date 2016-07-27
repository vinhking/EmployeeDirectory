<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?= $title ?></title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <style>
            .help-inline{
                color: red;
            }
        </style>
        <script language="javascript" >
          $(document).ready(function() {
              $('li.active').removeClass('active');
              $('a[href="' + location.pathname + '"]').closest('li').addClass('active'); 
              // $('a[href="' + location.pathname + '"]').parent().addClass('active');
          });
        </script>
    </head>
    <body>
        <?= $this->element('top_menu'); ?>

        <div class="container">
            <?php echo $this->fetch('content'); ?>
        </div>

    </body>
</html>
