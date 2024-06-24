<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dental Treatment Estimate</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            max-width: 800px;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
        }

        .header {
            background-color: #c3e6cb;
            padding: 20px;
            border-radius: 8px 8px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-left, .header-right {
            width: 45%;
        }

        .header-left h2, .header-right h2 {
            margin-bottom: 10px;
            color: #155724;
        }

        .header-right {
            text-align: right;
        }

        .header-right p {
            margin: 0;
        }

        .text-right {
            text-align: right;
        }

        .table {
            margin-top: 20px;
        }

        .table th {
            background-color: #c3e6cb;
            color: #155724;
        }

        .table tfoot td {
            font-weight: bold;
            background-color: #c3e6cb;
        }

        .estimate-total {
            font-size: 24px;
            color: #155724;
            margin-top: 10px;
        }

        .received-by {
            margin-top: 20px;
            color: #155724;
        }

        .signature {
            margin-top: 40px;
        }

        .signature p {
            display: inline-block;
            width: 45%;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="header">
            <div class="header-left">
                <h2>Client Information</h2>
                <p><strong>Name:</strong> Allan B. Smith</p>
                <p><strong>Address:</strong> 554 Candlelight Drive, Channel View</p>
                <p><strong>Contact Number:</strong> 222 091 1711</p>
                <p><strong>Email:</strong> allan@email.com</p>
            </div>
            <div class="header-right">
                <h2>Dent Company</h2>
                <p>1642 Monroe Street, Houston, TX 77032</p>
                <p>Email: dent@email.com</p>
                <p>Phone: 222 555 7777</p>
            </div>
        </div>

        <h2 class="text-center text-success mt-4">Dental Treatment Estimate</h2>
      

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Service No.</th>
                    <th>Service Description</th>
                    <th>Quantity</th>
                    <th>Unit Cost ($)</th>
                    <th>Total Amount ($)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>00-1011</td>
                    <td>Dental Exam</td>
                    <td>1</td>
                    <td>100.00</td>
                    <td>100.00</td>
                </tr>
                <tr>
                    <td>00-1021</td>
                    <td>Dental X-Rays</td>
                    <td>2</td>
                    <td>200.00</td>
                    <td>400.00</td>
                </tr>
                <tr>
                    <td>00-1031</td>
                    <td>Teeth Cleaning</td>
                    <td>1</td>
                    <td>120.00</td>
                    <td>120.00</td>
                </tr>
                <tr>
                    <td>00-1041</td>
                    <td>Tooth Filling</td>
                    <td>2</td>
                    <td>150.00</td>
                    <td>300.00</td>
                </tr>
                <tr>
                    <td>00-1051</td>
                    <td>Dental Crown</td>
                    <td>3</td>
                    <td>900.00</td>
                    <td>2,700.00</td>
                </tr>
                <tr>
                    <td>00-1061</td>
                    <td>Orthodontic Consultation</td>
                    <td>1</td>
                    <td>50.00</td>
                    <td>50.00</td>
                </tr>
                <tr>
                    <td>00-1071</td>
                    <td>Braces (Ceramic Braces)</td>
                    <td>1</td>
                    <td>4,500.00</td>
                    <td>4,500.00</td>
                </tr>
                <tr>
                    <td>00-1081</td>
                    <td>Dental Braces</td>
                    <td>2</td>
                    <td>2,000.00</td>
                    <td>4,000.00</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="text-right">Subtotal:</td>
                    <td>$12,170.00</td>
                </tr>
                <tr>
                    <td colspan="4" class="text-right">Tax (7%):</td>
                    <td>$851.90</td>
                </tr>
                <tr>
                    <td colspan="4" class="text-right">Total Estimated Cost:</td>
                    <td>$11,318.10</td>
                </tr>
            </tfoot>
        </table>

        <div class="received-by">
            <p><strong>Received By:</strong></p>
            <p>______________________</p>
        </div>
        <div class="signature">
            <p>Signature Over Printed Name</p>
            <p>Date Signed: ______________________</p>
        </div>
    </div>
</body>
</html>
