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
            /* border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); */
            margin: 20px auto;
        }

        .header {
            background-color: #ffffff;
            padding: 10px 0;
            border-radius: 8px 8px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #155724;
            flex-direction: column;
            text-align: center;
        }

        .header img {
            height: 80px;
            margin-bottom: 5px;
        }

        .header-left, .header-right {
            width: 100%;
        }

        .header-left p, .header-right p {
            margin: 0;
            font-size: 14px;
        }

        .info-section {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            padding: 10px;
            background-color: #e9f5e9;
            border-radius: 5px;
        }

        .info-section p {
            margin: 0;
            font-size: 16px;
        }

        .info-section strong {
            color: #155724;
        }

        .text-right {
            text-align: right;
        }

        .table {
            margin-top: 20px;
        }

        .table th {
            background-color: #d4edda;
            color: #155724;
            border: 2px solid #155724;
        }

        .table td {
            border: 1px solid #155724;
        }

        .table tfoot td {
            font-weight: bold;
            background-color: #e9f5e9;
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
            <img src="./admin/asset/images/QOSOL_BILE_LOGO_WHITE_BG.jpg" id="logo_img" alt="QosolBile Logo">
            <div class="header-left">
                <p><strong>ADDRESS:</strong>Somali Star Street</p>
                <p>Email: qosolbiledentalcare@gmail.com</p>
                <p>Phone: 222 555 7777</p>
            </div>
        </div>

        <div class="info-section">
            <div class="client-info">
                <p><strong>Patient NAME:</strong> Allan B. Smith</p>
                <p><strong>Date:</strong> 554 Candlelight Drive, Channel View</p>
            </div>
            <div class="contact-info">
                <p><strong>CONTACT NUMBER:</strong> 222 091 1711</p>
                <p><strong>EMAIL:</strong> allan@gmail.com</p>
            </div>
        </div>

        <!-- <h2 class="text-center text-success mt-4">Dental Treatment Estimate</h2> -->

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Service </th>
                    <th>Treatment Description</th>
                    <th>Quantity</th>
                    <th>Unit Cost ($)</th>
                    <th>Total Amount ($)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Teeth Cleaning</td>
                    <td>Electrical Brush</td>
                    <td>1</td>
                    <td>120.00</td>
                    <td>120.00</td>
                </tr>
              
               
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" class="text-right">Subtotal:</td>
                    <td>$12,170.00</td>
                </tr>
                <tr>
                    <td colspan="4" class="text-right">Discount (7%):</td>
                    <td>$851.90</td>
                </tr>
                <tr>
                    <td colspan="4" class="text-right">Total Estimated Cost:</td>
                    <td>$11,318.10</td>
                </tr>
            </tfoot>
        </table>

        <div class="received-by">
            <p><strong>RECEIVED BY:</strong></p>
            <p>______________________</p>
        </div>
        <div class="signature">
            <p>Signature Over Printed Name</p>
            <p>Date Signed: ______________________</p>
        </div>
    </div>
</body>
</html>
