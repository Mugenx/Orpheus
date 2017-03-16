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
                $dbname = "orpheus";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if($conn->connect_error)
                {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM tLoanedOut WHERE fDueDate < NOW()";
                $result = $conn->query($sql);

                if($result->num_rows > 0)
                {
                    echo "<table border = '1'>";
                        echo "<tr>";
                            echo "<th colspan = '4'><em> Loaned Out </em></th>";
                        echo "</tr>";

                        echo "<tr>";
                        echo "<td>Equipment Tag</td>";
                        echo "<td>Student Number</td>";
                        echo "<td>Loaned Date</td>";
                        echo "<td>Due Date</td>";
                        echo "</tr>";

                    while($row = $result->fetch_assoc())
                    {
                        echo "<tr>";
                            echo "<td>" . $row['fEquipmentTag'] . "</td>";
                            echo "<td>" . $row['fStudentNumber'] . "</td>";
                            echo "<td>" . $row['fLoanedDate'] . "</td>";
                            echo "<td>" . $row['fDueDate'] . "</td>";
                        echo "</tr>";
                    }

                    echo "</table";
                }

                $conn->close();

                ?>
    </body>
</html>
