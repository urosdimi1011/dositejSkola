<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Novi student</title>
</head>
<body>
<h2>Upis novog Studenta</h2>
<ul>
    <li><strong>Ime:</strong> {{ $student['ime'] }}</li>
    <li><strong>Prezime:</strong> {{ $student['prezime'] }}</li>
    <li><strong>JMBG:</strong> {{ $student['jmbg'] }}</li>
    <li><strong>Datum rođenja:</strong> {{ $student['datumRodjenja'] }}</li>
    <li><strong>Mesto rođenja:</strong> {{ $student['mestoRodjenja'] }}</li>
    <li><strong>Program:</strong> {{ $student['st_program'] }}</li>
    <li><strong>Mobilni:</strong> {{ $student['mobilniTelefon'] }}</li>
    <li><strong>Email:</strong> {{ $student['email'] }}</li>
    <!-- i ostala polja… -->
</ul>
</body>
</html>
