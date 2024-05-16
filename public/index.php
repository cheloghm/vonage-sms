<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vonage SMS Sender</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }
        .container {
            display: flex;
            justify-content: space-between;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-container {
            width: 45%;
        }
        h1 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 10px;
        }
        input[type="text"],
        textarea {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        textarea {
            resize: vertical;
        }
        input[type="submit"] {
            margin-top: 20px;
            padding: 10px;
            border: none;
            border-radius: 4px;
            background-color: #28a745;
            color: white;
            font-size: 1em;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h1>Send SMS</h1>
            <form action="send_manual_sms.php" method="post">
                <label for="number">Phone Number:</label>
                <input type="text" id="number" name="number"><br><br>
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name"><br><br>
                <label for="message">Message:</label>
                <textarea id="message" name="message"></textarea><br><br>
                <input type="submit" value="Send SMS">
            </form>
        </div>
        <div class="form-container">
            <h1>Send SMS from Google Sheets</h1>
            <form action="send_sheet_sms.php" method="post">
                <label for="spreadsheet_id">Spreadsheet ID:</label>
                <input type="text" id="spreadsheet_id" name="spreadsheet_id"><br><br>
                <label for="range">Range (e.g., Sheet1!A1:B10):</label>
                <input type="text" id="range" name="range"><br><br>
                <label for="message">Message:</label>
                <textarea id="message" name="message"></textarea><br><br>
                <input type="submit" value="Send SMS">
            </form>
        </div>
    </div>
</body>
</html>
