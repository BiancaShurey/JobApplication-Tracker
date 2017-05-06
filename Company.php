<?php require 'phpfunctions\header.php';?>

<body>


<div class="cover-bg">
  <div class="row">
    <div class="col-sm-12 center-block text-center">
    <h1>Company Registration</h1>
  </div>
  </div>
  <br><br>

  <div class="row">
    <div class="container">

    <form class="form-horizontal" role="form" name="registration" method="post" action="database.php">
        <!-- Organisation Name-->
        <div class="form-group">
            <label for="organisation" class=" col-sm-4   control-label">Organisation</label>
            <div class="col-xs-8 col-md-5  ">
                <input type="text" id="uqID" name="organisation" placeholder="Company Name" class="form-control" required="Required">
            </div>
        </div>

        <!-- Type-->
        <div class="form-group">
            <label for="type" class=" col-xs-4 control-label">Type</label>
            <div class="col-xs-8 col-md-5">
                <input type="text" name="type" id="fullName" placeholder="Tech" class="form-control" required="Required">
            </div>
        </div>

        <!-- Industry -->
        <div class="form-group">
            <label for="industry" class=" col-xs-4 control-label">Industry</label>
            <div class="col-xs-8 col-md-5">
                <input type="text" name="industry" id="major" placeholder="Real Estate" class="form-control" required="Required">
            </div>
        </div>


        <!-- Location -->
        <div class="form-group">
            <label for="location" class=" col-xs-4 control-label">Location</label>
            <div class="col-xs-8 col-md-5">
                <input type="text" name="location" id="email" placeholder="Search" class="form-control" required="Required">
            </div>
        </div>


        <!-- Submit Registration-->
        <div class="form-group">
          <div class="col-xs-4 "></div>
            <div class="col-xs-8 col-md-5 center-block">
                <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form> <!-- /form -->
  </div>
  </div>
</div>

</body></html>
