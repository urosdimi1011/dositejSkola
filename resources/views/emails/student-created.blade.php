<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Novi student</title>
</head>
<body>
<h2>Upis studenta</h2>
<ul>
    <li><strong>Ime:</strong> {{ $student['ime'] }}</li>
    <li><strong>Prezime:</strong> {{ $student['prezime'] }}</li>
    <li><strong>Roditelj:</strong> {{ $student['roditelj'] }}</li>
    <li><strong>JMBG:</strong> {{ $student['jmbg'] }}</li>
    <li><strong>Datum rođenja:</strong> {{ $student['datumRodjenja'] }}</li>
    <li><strong>Mesto rođenja:</strong> {{ $student['mestoRodjenja'] }}</li>
    <li><strong>Stalno prebivalište:</strong> {{ $student['mestoStalnogRodjenja'] }}</li>
    <li><strong>Adresa tokom studiranja (opciono):</strong> {{ $student['mestoZaVremeStudiranja'] ?? '—' }}</li>
    <li><strong>Državljanstvo:</strong> {{ $student['drzavljanstvo'] }}</li>
    <li><strong>Nacionalnost:</strong> {{ $student['nacionalnost'] }}</li>
    <li><strong>Studijski program:</strong> {{ $student['st_program'] }}</li>
    <li><strong>Završena srednja škola:</strong> {{ $student['zavrsenaSrednjaSkola'] }}</li>
    <li><strong>Mobilni telefon:</strong> {{ $student['mobilniTelefon'] }}</li>
    <li><strong>Email:</strong> {{ $student['email'] }}</li>
</ul>
</body>
</html>
