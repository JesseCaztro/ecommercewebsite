<?php
session_start();
include 'functions.php';
template_header('Product');
?>
    <div class="wrapper" > 
    <div class="card-body">
        
        <div class="col-md-3">
            &nbsp;
        </div>
        <div class="col-md-6">
         <h2>Search</h2> 
        <form action="results.php" method="post">
        <div class="form-group mb-3">
                <label>Choose Search Type:</label>
                <select name="searchtype" required class="form-control">
                  <option value="name">Name
                  <option value="id">ID
                  <option value="desc">Description
                </select>
            </div>    
            <div class="form-group">
                <label>Enter Search Term:</label>
                <input type="text" name="searchterm" class="form-control"  required>
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block" >Search</button>
            </div>
        </form>
        </div>
    </div>
    </div>
<?=template_footer()?>

