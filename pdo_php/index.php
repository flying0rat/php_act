<?php require_once 'core/dbConfig.php'; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Zoom Zoom Industries</title>
        <style>
		table, th, td {
			width: 500px;
			border: 1px solid black;
		}
	</style>
    </head>
    <body>
        <!--<pre>
        <?php
        //prepares the query that will be used to get the data
        $stmt = $pdo->prepare('select m.model_name, w.order_id, w.production_status 
        from work_order as w join motor_model as m on w.model_id = m.model_id;');

        //once the sql query executes, the data will be presented
        if ($stmt->execute()) {
            print_r($stmt->fetchAll());
        }
        ?>
        </pre>-->
        
        <!--<pre>
        <?php
        //prepare the query that looks for machine equipment that can be found in the tagaytay factory
        $stmt = $pdo->prepare("SELECT m.machine_id, m.machine_type, m.current_status
        FROM machine_equipment as m 
        join production_line as p on m.line_id = p.line_id 
        join factory as f on p.factory_id = f.factory_id 
        where location = 'Tagaytay';");

        //the data will be presented once the query is executed 
        if ($stmt->execute()) {
            print_r($stmt->fetch());
        }
        ?>
        </pre>-->

        <!--<?php
        //store the query in a variable
        $query = "INSERT INTO supplier VALUES (?,?,?,?);";

        $stmt = $pdo->prepare($query);

        //specify the values to be put on the placeholder in the query
        $executeQuery = $stmt->execute(
            [3, 'Parts Supplier 3', 'Calamba', 'supplier.3@gmail.com']
        );
        
        //checks whether the query was executed and displays an output depending on the result
        if ($executeQuery) {
            echo "Query Succesful";
        } else {
            echo "Query Failed";
        }
        ?>-->

        <!--<?php
        //store the query in a variable
        $query = "DELETE FROM supplier WHERE supplier_id = 3;";

        //prepare the query to be executed
        $stmt = $pdo->prepare($query);

        //execute the query
        $executeQuery = $stmt->execute();
        
        //checks whether the query was executed and displays an output depending on the result
        if ($executeQuery) {
            echo "Deletion Succesful";
        } else {
            echo "Query Failed";
        }
        ?>-->

        <!--<?php
        //store the query in a variable
        $query = "UPDATE supplier SET contact_email = ? WHERE supplier_id = 2";

        //prepare the query to be executed
        $stmt = $pdo->prepare($query);

        //specify the value to be updated
        $executeQuery = $stmt->execute(
            ["supplier.2@gmail.com"]
        );

        //check whether the query was successfully executed
        if ($executeQuery) {
            echo "Update successful!";
        } else {
            echo "Query failed";
        }
        ?>-->

        <?php
        //store the query in a variable
        $query = "SELECT m.material_id, m.material_type, mm.model_name, f.location as factory_location from material as m join motor_model as mm on m.model_id = mm.model_id join factory as f on m.factory_id = f.factory_id;";

        //prepare and execute the query
        $stmt = $pdo->prepare($query);
        $executeQuery = $stmt->execute();

        //check if the query executed properly
        if ($executeQuery) {
            //fetch all the data selected from the query
            $availMaterial = $stmt->fetchAll();
        } else {
            echo "Query failed";
        }
        ?>

        <table>
            <tr>  # header for each column
                <th>ID</th>
                <th>Material Type</th>
                <th>Model Name</th>
                <th>Factory Location</th>
            </tr>
            # for loop for putting the data in the table
            <?php foreach ($availMaterial as $row) { ?>
            <tr>
                <td><?php echo $row['material_id'] ?></td>
                <td><?php echo $row['material_type'] ?></td>
                <td><?php echo $row['model_name'] ?></td>
                <td><?php echo $row['factory_location'] ?></td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>