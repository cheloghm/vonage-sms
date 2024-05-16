<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vonage SMS Sender</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
            width: 80%;
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
            <form id="manual-sms-form">
                <label for="number">Phone Number:</label>
                <input type="text" id="number" name="number" required><br><br>
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" required><br><br>
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea><br><br>
                <input type="submit" value="Send SMS">
            </form>
        </div>
        <div class="form-container">
            <h1>Send SMS from Google Sheets</h1>
            <form action="send_sheet_sms.php" method="post">
                <label for="spreadsheet_id">Spreadsheet ID:</label>
                <input type="text" id="spreadsheet_id" name="spreadsheet_id" required><br><br>
                <label for="range">Range (e.g., Sheet1!A1:B10):</label>
                <input type="text" id="range" name="range" required><br><br>
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea><br><br>
                <input type="submit" value="Send SMS">
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="responseModal" tabindex="-1" role="dialog" aria-labelledby="responseModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="responseModalLabel">Response</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modal-message"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('manual-sms-form').addEventListener('submit', function(event) {
            event.preventDefault();
            var formData = new FormData(this);

            fetch('send_manual_sms.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('modal-message').innerText = data.message;
                $('#responseModal').modal('show');
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('modal-message').innerText = 'An error occurred: ' + error.message;
                $('#responseModal').modal('show');
            });
        });
    </script>
</body>
</html>
