<?php require 'phpfunctions\header.php';?>

<body>
<div class="cover-bg">
  <div class="row">
    <div class="col-sm-12 center-block text-center">
    <h1>About</h1>
  </div>
  </div>
  <br><br>

  <div class="row">
    <div class="container">

    <form class="form-horizontal" role="form" name="registration" method="post" action="database1.php">
        <!-- Organisation Name-->
        <div class="form-group">
            <label for="uqID" class=" col-sm-4   control-label">Values</label>
            <div class="col-xs-8 col-md-5  ">
                <input type="number" id="uqID" name="values" placeholder="Values" class="form-control" required="Required">
            </div>
        </div>

        <!-- Type-->
        <div class="form-group">
            <label for="fullName" class=" col-xs-4 control-label">Diversity</label>
            <div class="col-xs-8 col-md-5">
                <input type="text" name="diversity" id="diversity" placeholder="Diversity" class="form-control" required="Required">
            </div>
        </div>

        <!-- Industry -->
        <div class="form-group">
            <label for="major" class=" col-xs-4 control-label">Contact</label>
            <div class="col-xs-8 col-md-5">
                <input type="text" name="contact" id="major" placeholder="Diversity" class="form-control" required="Required">
            </div>
        </div>


        <!-- Location -->
        <div class="form-group">
            <label for="email" class=" col-xs-4 control-label">Location</label>
            <div class="col-xs-8 col-md-5">
                <input type="email" name="location" id="email" placeholder="Search" class="form-control" required="Required">
            </div>
        </div>

		<!-- Location -->
        <div class="form-group">
            <label for="email" class=" col-xs-4 control-label">Size</label>
            <div class="col-xs-8 col-md-5">
                <input type="email" name="size" id="email" placeholder="Size" class="form-control" required="Required">
            </div>
        </div>

		<!-- Location -->
        <div class="form-group">
            <label for="email" class=" col-xs-4 control-label">Growth</label>
            <div class="col-xs-8 col-md-5">
                <input type="email" name="growth" id="email" placeholder="Growth" class="form-control" required="Required">
            </div>
        </div>

		<!-- Location -->
        <div class="form-group">
            <label for="email" class=" col-xs-4 control-label">Website</label>
            <div class="col-xs-8 col-md-5">
                <input type="email" name="website" id="email" placeholder="URL" class="form-control" required="Required">
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
