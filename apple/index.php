<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f4f4f4;
        }
        h1 {
            text-align: center;
        }
        .user-data {
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 5px;
            max-width: 400px;
        }
        .user-data p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <h1>Telegram User Data</h1>
    <div class="user-data" id="user-data">
        <!-- Daten werden hier eingefügt -->
    </div>

    <script>
        // Daten von der JSON-Datei abrufen
        fetch('user_data.json')
            .then(response => response.json())
            .then(data => {
                // Daten in HTML anzeigen
                const userDataDiv = document.getElementById('user-data');
                userDataDiv.innerHTML = `
                    <p><strong>Telegram ID:</strong> ${data.telegram_id}</p>
                    <p><strong>First Name:</strong> ${data.first_name}</p>
                    <p><strong>Last Name:</strong> ${data.last_name}</p>
                    <p><strong>Username:</strong> ${data.username}</p>
                `;
            })
            .catch(error => {
                console.error('Error fetching user data:', error);
            });
    </script>
</body>
</html>
