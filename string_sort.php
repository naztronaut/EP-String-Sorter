<!--Script created by Nazmus at www.EasyProgramming.net -->

<html xmlns="http://www.w3.org/1999/xhtml">
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" rel="stylesheet" />
<body>
    <div class="container">
    <div class="row container">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        
<h2>EP String Sorter</h2>
<!--        HTML Form for end user - reloads on same page -->
<form role="form" method="POST" action="<?php htmlentities($_SERVER["PHP_SELF"])?>">
    
<!--    Order selection - ascending, descending, or random-->
    <div class="form-group">
      <label for="order">Select Order:</label>
      <select class="form-control" id="order" name="order">
<!--PHP grabs order value from POST and applies the 'selected' attritubet to the associated <option> tag-->
        <option <?php if(isset($_POST['order'])){ if($_POST['order'] == 'Ascending'){ echo 'selected';}}?>>Ascending</option>
        <option <?php if(isset($_POST['order'])){ if($_POST['order'] == 'Descending'){ echo 'selected';}}?>>Descending</option>
        <option <?php if(isset($_POST['order'])){ if($_POST['order'] == 'Random'){ echo 'selected';}}?>>Random</option>
      </select>
    </div>
    
<!--Array entry - one per line-->
    <div class="form-group">
  <label for="array">Your Values (one per line):</label>
  <textarea class="form-control" rows="5" id="array" name="array"><?php if(isset($_POST['array'])){echo $_POST['array'];}?></textarea>
</div>

    <div class="form-group">
        <button type="submit" class="btn btn-default" name="submit">Submit</button>
        <button type="reset" class="btn btn-default">Reset</button>
    </div>
</form>
<!--End form-->

<?php
// Activates code block if submit button is clicked
    if(isset($_POST['submit'])){

        // Checks to see if order is selected and which
        if(isset($_POST['order'])){
            $order = $_POST['order'];
        }
        // Checks to see if an array is passed - and splits input into array $sorted at End Of Line (PHP_EOL)
        if(isset($_POST['array'])){
            $sorted = explode(PHP_EOL, $_POST['array']);
            $numarray = sizeof($sorted);
        }
        
        //runs a different sort based on order input
        if($order=='Ascending')
        {
            asort($sorted);
        }
        elseif($order == 'Descending')
        {
            arsort($sorted);
        }
        else
        {
            //random array shuffle
            shuffle($sorted);
        }
?>
<!--Form input to display sorted values - only appears if submitted -->
<pre class="pre-scrollable"><?php 
    foreach($sorted as $key => $val)
    {
        echo "$val\n"; //print each sorted value in a new line
    }
    ?></pre>

<?php
	echo '<br /> The above list has been sorted in '.$order. ' order.';
    }
?>
</div> 
    </div>
    </div>
</body>
    
</html>
