<?php
// Turn off displaying errors to prevent header issues
ini_set('display_errors', 0);
error_reporting(0);

// Include TCPDF library
require_once('tcpdf/tcpdf.php');
include 'connection.php';

if (isset($_GET['report'])) {
    $report = $_GET['report'];
    
    // Validate report type to prevent any injection
    $valid_reports = ['supplied_items', 'cus_delivery_info'];
    if (!in_array($report, $valid_reports)) {
        exit("Invalid Report Type");
    }
    
    // Define the query based on the report type
    switch ($report) {
        case 'supplied_items':
            $query = "SELECT item_id AS Item_ID, supplier_id, item_name, date, quantity, price, color, sizes, image_url, total_amount, category, payment_status
                      FROM supplied_items
                      ORDER BY date DESC";
            $title = "Supplied Items Report";
            break;
        
        case 'cus_delivery_info':
            $query = "SELECT id AS Delivery_ID, customer_id, first_name, last_name, address, phone_number, email, payment_method
                      FROM cus_delivery_info
                      ORDER BY id DESC";
            $title = "Customer Delivery Information Report";
            break;
    }
    
    // Execute query
    $result = mysqli_query($conn, $query);
    
    if (!$result) {
        exit("Error fetching data from the database: " . mysqli_error($conn));
    }
    
    if (mysqli_num_rows($result) == 0) {
        exit("No data available for this report.");
    }
    
    // Create a new TCPDF instance
    $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8');
    $pdf->SetCreator('Your Company Name');
    $pdf->SetAuthor('Your Company');
    $pdf->SetTitle($title);
    $pdf->SetSubject($title);
    $pdf->SetKeywords('report, pdf, data');
    
    // Remove default header/footer
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    
    // Add a page
    $pdf->AddPage();
    
    // Set margins
    $pdf->SetMargins(10, 10, 10);
    $pdf->SetAutoPageBreak(true, 15);
    
    // Add report header
    $pdf->SetFont('helvetica', 'B', 16);
    $pdf->Cell(0, 15, $title, 0, 1, 'C');
    $pdf->SetFont('helvetica', '', 10);
    $pdf->Cell(0, 10, 'Generated on: ' . date('Y-m-d H:i:s'), 0, 1, 'C');
    $pdf->Ln(5);
    
    // Get field information
    $fields = mysqli_fetch_fields($result);
    if (!$fields) {
        exit("Error retrieving field information.");
    }
    
    // Calculate column widths - get count of columns first
    $num_columns = count($fields);
    $page_width = $pdf->getPageWidth() - 20; // Account for margins
    $column_width = $page_width / $num_columns;
    
    // Add table header
    $pdf->SetFont('helvetica', 'B', 10);
    $pdf->SetFillColor(220, 220, 220);
    
    foreach ($fields as $field) {
        $header_text = ucfirst(str_replace('_', ' ', $field->name));
        $pdf->Cell($column_width, 10, $header_text, 1, 0, 'C', true);
    }
    $pdf->Ln();
    
    // Add table rows with proper word wrapping
    $pdf->SetFont('helvetica', '', 9);
    $row_counter = 0;
    
    while ($row = mysqli_fetch_assoc($result)) {
        // Alternate row colors
        $fill = ($row_counter % 2) ? true : false;
        if ($fill) {
            $pdf->SetFillColor(240, 240, 240);
        } else {
            $pdf->SetFillColor(255, 255, 255);
        }
        
        // First determine max height for this row
        $max_height = 8; // Default minimum height
        $pos_before = $pdf->GetY();
        
        foreach ($row as $col_name => $value) {
            // Check if the column is too long
            if (strlen($value) > 50) {
                $value = substr($value, 0, 47) . '...';
            }
            
            // Handle NULL or empty values
            $value = ($value === null || $value === '') ? '-' : $value;
            
            // Write the cell
            $col_index = array_search($col_name, array_column($fields, 'name'));
            $pdf->Cell($column_width, $max_height, $value, 1, 0, 'L', $fill);
        }
        $pdf->Ln($max_height);
        
        $row_counter++;
    }
    
    // Add footer with page numbers
    $pdf->SetY(-15);
    $pdf->SetFont('helvetica', 'I', 8);
    $pdf->Cell(0, 10, 'Page ' . $pdf->getAliasNumPage() . ' of ' . $pdf->getAliasNbPages(), 0, 0, 'C');
    
    // Output PDF - must use 'D' for download without display
    $filename = strtolower(str_replace(' ', '_', $title)) . '_' . date('Ymd') . '.pdf';
    $pdf->Output($filename, 'D');
    exit;
    
} else {
    echo "No report type specified.";
}
?>