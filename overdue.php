<!DOCTYPE html>
<html>
    <head>

    </head>
    <body>
                <h1>Overdue</h1>
                <?php

                $servername = "localhost";
                $username = "username";
                $password = "password";
                $dbname = "alms";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if($conn->connect_error)
                {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM loanedout WHERE DueDate < NOW()";
                $result = $conn->query($sql);

                if($result->num_rows > 0)
                {
                    echo "<table border = '1'>";
                        echo "<tr>";
                            echo "<th colspan = '5'><em> Loan History </em></th>";
                        echo "</tr>";

                        echo "<tr>";
                        echo "<td>Loaned Out ID</td>";
                        echo "<td>Equipment Record ID</td>";
                        echo "<td>Student Number</td>";
                        echo "<td>Loaned Date</td>";
                        echo "<td>Due Date</td>";
                        echo "</tr>";

                    while($row = $result->fetch_assoc())
                    {
                        echo "<tr>";
                            echo "<td>" . $row['LoanedOutID'] . "</td>";
                            echo "<td>" . $row['EquipmentRecordID'] . "</td>";
                            echo "<td>" . $row['StudentNumber'] . "</td>";
                            echo "<td>" . $row['LoanedDate'] . "</td>";
                            echo "<td>" . $row['DueDate'] . "</td>";
                        echo "</tr>";
                    }

                    echo "</table";
                }
                else
                {
                    echo "Zero results";
                }

                $conn->close();

                ?>
    </body>
</html>
