<?php
echo '<pre>'; print_r($_SESSION); echo '</pre>';
echo '<pre>'; print_r($value); echo '</pre>';

?>


<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
                           
  <form action="index.php" method="post" enctype="multipart/form-data" onsubmit="return confirm('Do you really want to submit the form?');">

  	<div class="col-xs-6 form-group">
      <label class="control-label col-xs-6" for="email">Email:</label>
      <div class="col-xs-6">
        <input type="text" class="form-control" name="email" id="email" placeholder="Enter email">
      </div>
    </div>

    <div class="col-xs-6 form-group">
      <label class="control-label col-xs-6" for="password">Password:</label>
      <div class="col-xs-6">         
        <input type="text" class="form-control" name="password" id="password" placeholder="Password">
      </div>
    </div>

    <div class="col-xs-6 form-group">        
      <div class="col-sm-offset-2 col-xs-6">

      <button type="submit" class="btn-info form-control" value="submit_login" name="submit">Submit</button>
      </div>
     </div>
    </form>
   </div>
  </div>
 </div>
