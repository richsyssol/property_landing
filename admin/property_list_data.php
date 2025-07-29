<?php
ob_start(); // Start output buffering at the very top

include 'session_check.php';
include 'header.php';
include 'includes/db_conn.php';
require('fpdf/fpdf.php');

// Set default date range (Today)
$start_date = date('Y-m-d');
$end_date = date('Y-m-d');

// Check if a date range is selected
if (isset($_POST['start_date']) && isset($_POST['end_date'])) {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];
}

// Fetch data based on date range
$sql = "SELECT * FROM inquiries_property_list WHERE DATE(created_at) BETWEEN ? AND ? ORDER BY created_at DESC";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $start_date, $end_date);
$stmt->execute();
$result = $stmt->get_result();

// ✅ Fix: Separate CSV and PDF exports from regular output
if (isset($_POST['generate_csv']) || isset($_POST['generate_pdf'])) {
    if (ob_get_length()) { ob_clean(); } // Clear previous output

    if (isset($_POST['generate_csv'])) {
        // Set headers for CSV download
        header('Content-Type: text/csv; charset=utf-8');
        header("Content-Disposition: attachment; filename=inquiries-report-$start_date-$end_date.csv");

        $output = fopen('php://output', 'w');
        fputcsv($output, ['Sr.No', 'Date', 'First Name','Last Name', 'Email', 'Contact', 'Message', 'Slug']);

        // Execute query again for CSV export
        $stmt->execute();
        $result = $stmt->get_result();
        $serial_number = 1;

        while ($row = $result->fetch_assoc()) {
            fputcsv($output, [
                $serial_number++,
                (new DateTime($row['created_at']))->format('d/m/Y'),
                $row['first_name'],
                $row['last_name'],
                $row['email'],
                $row['contact'],
                $row['property'],
                $row['slug'],
            ]);
        }

        fclose($output);
        exit(); // Prevent further execution
    }

    if (isset($_POST['generate_pdf'])) {
        // Set up PDF document
        $pdf = new FPDF('L', 'mm', 'A3');
        $pdf->SetMargins(10, 10, 10);
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, "Client Report ($start_date - $end_date)", 0, 1, 'C');

        // Add column headers
        $pdf->SetFont('Arial', 'B', 10);
        $columns = ['Sr.No', 'Date', 'First Name','Last Name', 'Email', 'Contact', 'Message', 'Slug'];
        $widths = [20, 20, 50, 50, 100, 30, 30, 30, 30];

        foreach ($columns as $i => $col) {
            $pdf->Cell($widths[$i], 10, $col, 1);
        }
        $pdf->Ln();

        // Fetch data again for the PDF
        $stmt->execute();
        $result = $stmt->get_result();
        $pdf->SetFont('Arial', '', 10);
        $serial_number = 1;

        while ($row = $result->fetch_assoc()) {
            $pdf->Cell(20, 10, $serial_number++, 1);
            $pdf->Cell(20, 10, (new DateTime($row['created_at']))->format('d/m/Y'), 1);
            $pdf->Cell(50, 10, $row['first_name'], 1);
            $pdf->Cell(50, 10, $row['last_name'], 1);
            $pdf->Cell(100, 10, $row['email'], 1);
            $pdf->Cell(30, 10, $row['contact'], 1);
            $pdf->Cell(30, 10, $row['property'], 1);
            $pdf->Cell(30, 10, $row['slug'], 1);
            $pdf->Ln();
        }

        $pdf->Output('D', "client-report-$start_date-$end_date.pdf");
        exit();
    }
}

ob_end_flush(); // Flush output buffer at the end
?>




<div class="app-main__inner">
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-car icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>
                    Inquiries From Property List
                    <div class="page-title-subheading">
                        <a href="index.php">Dashboard</a> /
                        <a href="property_list_data.php">Inquiries From Property List</a>
                    </div>
                </div>
                
            </div>
            
        </div>
        
    </div> 

    <div>

<!-- Date Range Filter Form -->
        <form method="POST" class="row g-3 mb-3">
            <div class="col-md-3">
                <label for="start_date" class="form-label">Start Date:</label>
                <input type="date" name="start_date" id="start_date" class="form-control" value="<?= $start_date; ?>" required>
            </div>
            <div class="col-md-3">
                <label for="end_date" class="form-label">End Date:</label>
                <input type="date" name="end_date" id="end_date" class="form-control" value="<?= $end_date; ?>" required>
            </div>
            <div class="col-md-3">
                <label class="form-label d-block">&nbsp;</label>
                <button type="submit" class="btn btn-primary">Filter</button>
                <a href="client_report.php" class="btn btn-secondary">Reset</a>
            </div>
        </form>

        <!-- Export Buttons -->
        <form method="POST" class="d-flex gap-2">
            <input type="hidden" name="start_date" value="<?= $start_date; ?>">
            <input type="hidden" name="end_date" value="<?= $end_date; ?>">
            <button type="submit" name="generate_csv" class="btn btn-success">Export to CSV</button>
            <button type="submit" name="generate_pdf" class="btn btn-danger">Export to PDF</button>
        </form>

        <!-- Data Table -->
        <table class="table table-bordered mt-3">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Date</th>
                    <th>Client Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Message</th>
                    <th>Slug</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if ($result->num_rows > 0) {
                    $serial_number = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$serial_number}</td>
                                <td>" . (new DateTime($row['created_at']))->format('d/m/Y') . "</td>
                                <td>{$row['first_name']} {$row['last_name']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['contact']}</td>
                                <td>{$row['property']}</td>
                                <td>{$row['slug']}</td>
                            </tr>";
                        $serial_number++;
                    }
                } else {
                    echo "<tr><td colspan='9' class='text-center'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    

</div>






<?php 
include 'footer.php';
?>

