<?php include '../inc/header.php'; ?>

<?php include '../inc/footer.php'; ?>
</head>
<body>
    <div id="page-wrapper">
        <div class="row">
            <div class="container">
                <div class="col-lg-12">
                    <form action="insertExpenses.php" method="post">
                        <h1>Add Expenses</h1><br>

                        <label>Department</label>
                        <?php
                        include 'dbconnect.php';
                        $query = $conn->query("SELECT deptName FROM department");

                        echo '<select name="dept" class="form-control">'
                        . '<option>select Department</option>';
                        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                            echo '<option value="' . $row['deptName'] . '">' . $row['deptName'] . '</option>';
                        }
                        echo '</select>';
                        ?>

                        <br> 

                        <label>Expense</label>
                        <input class="form-control" type="text" name="ex" required><br>
                        <label>Amount</label>
                        <input class="form-control" type="text" name="am" required><br>
                        <label>Date</label>
                        <?php
                        $date = new DateTime();
                        $timeStamp = $date->getTimestamp();

                        echo "<input class='form-control' type='text' name='dt' value=" . date('Y/m/d H:i:s', $timeStamp) . "><br>";
                        ?>  
                        <label>Remarks</label>
                        <input class="form-control" type="text" name="Re" required><br>
                        <button class="btn btn-success" type="submit" name="add">Add</button>
                        <button class="btn btn-success" type="reset">Clear Entries</button>
                        <a href="viewExpenses.php"><input type="button" class="btn btn-success" value="View"></a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php
if (isset($_POST['add'])) {

    $department = $_POST['dept'];
    $expense = $_POST['ex'];
    $amount = $_POST['am'];
    $date = $_POST['dt'];
    $remarks = $_POST['Re'];

    include 'Classes/expenses.php';
    $add = new expenses();
    $add->{"addExpenses"}($department, $expense, $amount, $date, $remarks);
    //call_user_method("addExpenses", $add,$department,$expense,$amount,$date,$remarks);
}
?>





