<?php include('../../includes/config.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Jasmine Spec Runner</title>

  <link rel="shortcut icon" type="image/png" href="js/lib/jasmine-1.1.0/jasmine_favicon.png">
  <link rel="stylesheet" type="text/css" href="js/lib/jasmine-1.1.0/jasmine.css">
  
  <script src="js/lib/require-1.0.8.min.js"></script>
  
  <script src="js/lib/jasmine-1.1.0/jasmine.js"></script>
  <script src="js/lib/jasmine-1.1.0/jasmine-html.js"></script>

  <script>
  
    require.config({
       baseUrl: 'js'
    });
    
    require([
        'spec/ModuleSpec'
    ], function () {
        
        (function() {
          var jasmineEnv = jasmine.getEnv();
          jasmineEnv.updateInterval = 1000;

          var htmlReporter = new jasmine.HtmlReporter();

          jasmineEnv.addReporter(htmlReporter);

          jasmineEnv.specFilter = function(spec) {
            return htmlReporter.specFilter(spec);
          };

          var currentWindowOnload = window.onload;

          window.onload = function() {
            if (currentWindowOnload) {
              currentWindowOnload();
            }
            execJasmine();
          };

          function execJasmine() {
            jasmineEnv.execute();
          }

        })();
        
    });
  
  </script>

  <?php include('../../includes/analytics.php'); ?>

</head>

<body>
</body>
</html>
