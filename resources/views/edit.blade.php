<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Perkuliahan</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <div class="container">
        <h1>Edit Perkuliahan</h1>
        <form id="editForm" class="form">
            @csrf
            @method('POST')
            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" id="nim" name="nim">
            </div>

            <div class="form-group">
                <label for="kode_mk">Kode MK:</label>
                <input type="text" id="kode_mk" name="kode_mk">
            </div>

            <div class="form-group">
                <label for="nilai">Nilai:</label>
                <input type="text" id="nilai" name="nilai">
            </div>

            <button type="submit" class="btn-submit">Submit</button>
        </form>
    </div>

    <script>
        document.getElementById('editForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const nim = document.getElementById('nim').value;
            const kode_mk = document.getElementById('kode_mk').value;
            const nilai = document.getElementById('nilai').value;

            fetch(`/api/v1/perkuliahan/${nim}/${kode_mk}`, { 
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({nilai}),
            })
            .then(response => {
                if (response.ok) {
                    window.location.href = '/';
                } else {
                    console.error('Error:', response.statusText);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>
