<?php
require_once('tcpdf/tcpdf.php');
function generatePDF($amount, $type) {
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);

    $pdf->SetCreator('Aberdeen Bus Company');
    $pdf->SetAuthor('Aberdeen Bus Company');
    $pdf->SetTitle('Bus Ticket');
    $pdf->SetSubject('Bus Ticket');
    $pdf->SetKeywords('Bus, Ticket, Aberdeen');

    $pdf->SetFont('helvetica', '', 12);

    $pdf->AddPage();

    $content = "
        <div class='ticket'>
            <h1>Aberdeen Bus Ticket</h1>
            <div class='ticket-info'>
                <p><strong>Amount:</strong> £{$amount}</p>
                <p><strong>Ticket Type:</strong> {$type}</p>
            </div>
        </div>
    ";

    $pdf->writeHTML($content);

    $qr_code_url = "https://api.qrserver.com/v1/create-qr-code/?data={$amount}&size=150x150";
    $qr_code_image = file_get_contents($qr_code_url);

    $pdf->Image('@' . $qr_code_image, $pdf->GetX(), $pdf->GetY(), 40, 40);

    $pdf->Output('ticket.pdf', 'D');
}

if (isset($_POST['amount'], $_POST['type'])) {
    $amount = $_POST['amount'];
    $type = $_POST['type'];

    generatePDF($amount, $type);
} else {
    echo "<p>Error: Amount or type not specified</p>";
}
?>
