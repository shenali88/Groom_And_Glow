<?php
include 'connection.php';

if (isset($_POST['report'])) {
    $report = $_POST['report'];

    // Debugging Output
    var_dump($report); // Check the value of $report

    switch ($report) {
        case 'supplied_items':
            $query = "SELECT item_id AS Item_ID, supplier_id, item_name, date, quantity, price, color, sizes, image_url, total_amount, category, payment_status
                      FROM supplied_items
                      ORDER BY date DESC";
            break;

        case 'cus_delivery_info':
            $query = "SELECT id AS Delivery_ID, customer_id, first_name, last_name, address, phone_number, email, payment_method
                      FROM cus_delivery_info
                      ORDER BY id DESC";
            break;

        // Add more cases as necessary...

        default:
            echo "<p class='text-danger'>Invalid Report Type: " . htmlspecialchars($report) . "!</p>";
            exit;
    }

    // Execute Query
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<div class='overflow-x-auto'>";
        echo "<table class='min-w-full border border-gray-400 bg-white shadow-md rounded-lg'>";
        echo "<thead class='bg-gray-700 text-white'>";
        echo "<tr>";
    
        while ($field = mysqli_fetch_field($result)) {
            echo "<th class='border border-gray-400 px-4 py-2 text-left'>" . ucfirst(str_replace('_', ' ', $field->name)) . "</th>";
        }
        
        echo "</tr></thead><tbody>";
    
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr class='hover:bg-gray-100'>";
            foreach ($row as $value) {
                echo "<td class='border border-gray-400 px-4 py-2'>" . htmlspecialchars($value) . "</td>";
            }
            echo "</tr>";
        }
    
        echo "</tbody></table></div>";
    } else {
        echo "<p class='text-red-500 text-center'>No data available for the selected report.</p>";
    }
    
    exit; // Stop further execution
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="bg-gray-100">

    <div class="flex items-center justify-center min-h-screen">
        <div class="w-full max-w-6xl bg-white p-6 rounded-lg shadow-lg">


            <!-- Page Title -->
            <h2 class="text-center text-2xl font-bold text-yellow-600 mb-6">Generate Reports</h2>
            
            <!-- Report Selection -->
            <div class="mb-4">
                <label for="reportSelect" class="block text-lg font-medium text-gray-700 mb-2">Select a Report:</label>
                <select id="reportSelect" class="w-full p-3 border border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200">
                    <option value="">-- Select Report --</option>
                    <option value="supplied_items">Supplied Items Report</option>
                    <option value="cus_delivery_info">Customer Delivery Info Report</option>
                    <!-- Other reports can be added here -->
                </select>
            </div>

            <!-- Report Display Area -->
            <div id="reportContent" class="mt-4 bg-black-100 p-4 rounded-lg shadow-sm min-h-[100px]">
                <p class="text-yellow-600 text-center">Select a report to display data here.</p>
            </div>

            <!-- Buttons: Go Back and Download PDF -->
            <div class="flex justify-center mt-6 space-x-4">
                <button id="goBack" class="bg-yellow-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md hover:bg-yellow-700 transition duration-300">
                    Go Back
                </button>
                <button id="downloadPdf" class="hidden bg-yellow-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md hover:bg-yellow-700 transition duration-300">
                    Download PDF
                </button>
            </div>

        </div>
    </div>

<script>
$(document).ready(function(){
    $('#reportSelect').change(function(){
        var reportType = $(this).val();
        if(reportType !== "") {
            $.ajax({
                url: '', // Same page
                type: 'POST',
                data: {report: reportType},
                success: function(response){
                    $('#reportContent').html(response);
                    $('#downloadPdf').show().attr('data-report', reportType); // Show the button and set data-report
                }
            });
        } else {
            $('#reportContent').html('');
            $('#downloadPdf').hide(); // Hide button if no report selected
        }
    });

    // Handle PDF Download
    $('#downloadPdf').click(function(){
        var reportType = $(this).attr('data-report');
        window.location.href = 'download_pdf.php?report=' + reportType;
    });
    
    // Handle Go Back button
    $('#goBack').click(function(){
        window.location.href = 'admindashcustomer.php';
    });
});
</script>

</body>
</html>