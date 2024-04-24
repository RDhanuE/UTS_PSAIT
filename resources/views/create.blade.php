<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Perkuliahan</title>
</head>
<body>
    <h1>Create Perkuliahan</h1>
    <form id="createForm">
        <label for="nim">NIM:</label><br>
        <input type="text" id="nim" name="nim"><br>

        <label for="kode_mk">Kode MK:</label><br>
        <input type="text" id="kode_mk" name="kode_mk"><br>

        <label for="nilai">Nilai:</label><br>
        <input type="text" id="nilai" name="nilai"><br>


        <button type="submit">Submit</button>
    </form>

    <script>
        document.getElementById('createForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const nim = document.getElementById('nim').value;
            const kode_mk = document.getElementById('kode_mk').value;
            const nilai = document.getElementById('nilai').value;

            fetch('/api/v1/perkuliahan', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ nim, kode_mk , nilai}),
            })
            .then(response => response.json())
            .then(data => {
                console.log('Success:', data);
                // Redirect or show success message as needed
            })
            .catch(error => {
                console.error('Error:', error);
                // Handle errors
            });
        });
    </script>
</body>
</html>
