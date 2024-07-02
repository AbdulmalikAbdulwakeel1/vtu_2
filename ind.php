<?php
// Assuming you have a database connection, replace this with your actual connection logic
$connect= mysqli_connect("localhost", "root", "", "project-i") ;

if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to get data bundles based on the selected network
function getDataBundles($connect, $networkId)
{
    $select = mysqli_query($connect, "SELECT * FROM databundle WHERE n_type='$networkId'");
    $options = '<option selected value="">Select Data Bundle</option>';

    if (mysqli_num_rows($select) > 0) {
        while ($row = mysqli_fetch_array($select)) {
            $type = $row['network'] . " " . $row['size'] . " " . "&#8358" . " " . $row['amount'] . " " . $row['plan_type'] . "," . $row['validity'] . " days validity";
            $options .= '<option value="' . $row['data_id'] . '">' . $type . '</option>';
        }
    }

    return $options;
}

// Function to get amount based on the selected data bundle
function getAmount($connect, $dataBundleId)
{
    $select = mysqli_query($connect, "SELECT amount FROM databundle WHERE data_id='$dataBundleId'");
    $row = mysqli_fetch_array($select);

    return $row['amount'];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Network and Data Bundle</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>

    <div class="network nt">
        <h4>Network:</h4>
        <select class="box" name="network" id="networkSelect" required onchange="loadDataBundles()">
            <option selected value="">Select Network Type</option>
            <option value="1">MTN</option>
            <option value="2">Glo</option>
            <option value="3">Airtel</option>
            <option value="6">9Mobile</option>
        </select>
    </div>

    <div class="network nt">
        <h4>Data Bundle:</h4>
        <select class="box" name="data_type" id="dataBundleSelect">
            <!-- Options will be dynamically loaded using JavaScript -->
        </select>
    </div>

    <div class="network nt">
        <h4>Amount:</h4>
        <div class="box" style="cursor: not-allowed;">
            <input type="text" name="price" id="amountInput" disabled>
        </div>
    </div>

    <script>
        function loadDataBundles() {
            var networkId = $("#networkSelect").val();
            if (networkId !== "") {
                $.ajax({
                    url: "", // Replace with the actual file name or leave it empty if in the same file
                    type: "POST",
                    data: { networkId: networkId },
                    success: function (response) {
                        console.log(response); // Debugging: Log the response to the console
                        $("#dataBundleSelect").html(response);
                        updateAmount();
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText); // Debugging: Log any error to the console
                    }
                });
            } else {
                $("#dataBundleSelect").html('<option selected value="">Select Data Bundle</option>');
                $("#amountInput").val("");
            }
        }

        function updateAmount() {
            var dataBundleId = $("#dataBundleSelect").val();
            if (dataBundleId !== "") {
                $.ajax({
                    url: "", // Replace with the actual file name or leave it empty if in the same file
                    type: "POST",
                    data: { dataBundleId: dataBundleId },
                    success: function (response) {
                        console.log(response); // Debugging: Log the response to the console
                        $("#amountInput").val(response);
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText); // Debugging: Log any error to the console
                    }
                });
            } else {
                $("#amountInput").val("");
            }
        }
    </script>

</body>

</html>
