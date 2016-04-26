<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Panel title</h3>
  </div>
  <div class="panel-body">
    <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
    	<div class="form-group">
    		<label for="name">Name</label>
    		<input type="text" class="form-control" name="name">
    	</div>

    	<div class="form-group">
    		<label for="email">Email</label>
    		<input name="email" type="text" class="form-control" />
    	</div>

    	<div class="form-group"><label for="pass">Password</label>
    		<input type="password" class="form-control" name="pass" />
    	</div>

    	<input type="submit" class="btn btn-primary" value="Submit" name="submit"/>
    </form>
  </div>