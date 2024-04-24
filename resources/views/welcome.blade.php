<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management System</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <h1>Management System</h1>
    <br>
    <table>
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Alamat</th>
                <th>Tanggal Lahir</th>
                <th>Kode MK</th>
                <th>Nama MK</th>
                <th>SKS</th>
                <th>Nilai</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody id="perkuliahanList">
        </tbody>
    </table>
    <br>
    <div class="center">
        <button class="create-button">
            <a href="{{ route('createData') }}">
                Create new data
            </a>
        </button>
    </div>

    <script>
        fetch('/api/v1/perkuliahan')
            .then(response => response.json())
            .then(data => {
                const perkuliahanList = document.getElementById('perkuliahanList');
                data.forEach(perkuliahan => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${perkuliahan.nim}</td>
                        <td>${perkuliahan.mahasiswa.nama}</td>
                        <td>${perkuliahan.mahasiswa.alamat}</td>
                        <td>${perkuliahan.mahasiswa.tanggal_lahir}</td>
                        <td>${perkuliahan.kode_mk}</td>
                        <td>${perkuliahan.mata_kuliah.nama_mk}</td>
                        <td>${perkuliahan.mata_kuliah.sks}</td>
                        <td>${perkuliahan.nilai}</td>
                        <td><button class="update-button"><a href="{{ route('updateData') }}">Update</a></button></td>
                        <td>
                            <form action="/api/v1/perkuliahan/${perkuliahan.nim}/${perkuliahan.kode_mk}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button" onclick="return confirm('Are you sure you want to delete this item?')">
                                    Delete</button>
                            </form>
                        </td>`;
                    perkuliahanList.appendChild(row);
                });
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const deleteForms = document.querySelectorAll('.delete-form');
            deleteForms.forEach(form => {
                form.addEventListener('submit', function (event) {
                    event.preventDefault(); // Prevent default form submission

                    if (confirm("Are you sure you want to delete this item?")) {
                        const formData = new FormData(form);

                        fetch(form.getAttribute('action'), {
                            method: 'DELETE',
                            body: formData
                        })
                        .then(response => {
                            if (response.ok) {
                                location.reload();
                            }
                        })
                        .then(data => {
                            location.reload();
                        })
                        .catch(error => {
                            console.error('Error deleting perkuliahan:', error);
                        });
                    }
                });
            });
        });
    </script>
    
</body>
</html>
