<?php include('../../includes/config.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Jasmine Spec Runner</title>

  <link rel="shortcut icon" type="image/png" href="js/lib/jasmine-1.1.0/jasmine_favicon.png">

  <link rel="stylesheet" type="text/css" href="js/lib/jasmine-1.1.0/jasmine.css">
  <script type="text/javascript" src="js/lib/jasmine-1.1.0/jasmine.js"></script>
  <script type="text/javascript" src="js/lib/jasmine-1.1.0/jasmine-html.js"></script>

  <!-- include source files here... -->
  <script type="text/javascript" src="js/spec/SpecHelper.js"></script>
  <script type="text/javascript" src="js/spec/PlayerSpec.js"></script>

  <!-- include spec files here... -->
  <script type="text/javascript" src="js/src/Player.js"></script>
  <script type="text/javascript" src="js/src/Song.js"></script>

  <script type="text/javascript">
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
  </script>

  <?php include('../../includes/analytics.php'); ?>

</head>

<body>
</body>
</html>
