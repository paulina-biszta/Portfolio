<?php require_once 'dbconnect.php'; ?>
<!DOCTYPE html>
<html>
<head>
   <title>Insert</title>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body class="bg-success">
<body>
   <div class="container-fluid bg-success text-white p-4">
        <div class="row justify-content-center">
            <div class="col-6 justify-content-center mt-3 bg-dark p-4 rounded">
                <h1 class="mb-4 text-center">Add new plant!</h1>
                <form action="actions/insertdb.php" method="POST">
                    <div class="row">
                        <div class="form-group col">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                          
                        </div>
                        <div class="form-group col">    
                            <label for="age">Category</label>
                            <input type="text" class="form-control" id="category" name="category">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="description">Description</label>
                            <input type="text" class="form-control" id="desc" name="desc">
                           
                        </div>
                        <div class="form-group col">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" name="price">
                            
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                                <label for="rrp">Retail Price</label>
                                <input type="text" class="form-control" id="rrp" name="rrp">
                                
                            </div>
                        <div class="form-group col">
                                <label for="availability">Availability</label>
                                <select name="availability" id="availability" class="form-control">
                                    <option name="availability" value="yes">Yes</option>
                                    <option name="availability" value="no">No</option>
                                </select>
                            </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <label for="img">Image</label>
                            <input type="text" class="form-control" id="img" name="img">
                        </div>
</div>
                        
                    <div class="d-flex flex-column">
                        <button type="submit" value="Submit" name="submit" class="btn btn-success">Submit</button>
                    </div>
                    </div>
                   
                    
                </form >
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>