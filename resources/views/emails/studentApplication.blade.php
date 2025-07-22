<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="utf-8">
    <title>Novi student</title>
    <style>
        /* Global resets */
        body { margin: 0; padding: 0; background: #f5f5f5; }
        table { border-collapse: collapse; }

        /* Container */
        .wrapper {
            width: 100%;
            table-layout: fixed;
            background-color: #f5f5f5;
            padding: 20px 0;
        }
        .main {
            background-color: #ffffff;
            margin: 0 auto;
            width: 600px;
            border-radius: 4px;
            overflow: hidden;
            font-family: Arial, sans-serif;
            color: #333333;
        }

        /* Header */
        .header {
            background-color: #2980b9;
            padding: 20px;
            text-align: center;
        }
        .header h2 {
            margin: 0;
            color: #ffffff;
            font-size: 24px;
            line-height: 1.2;
        }

        /* Content */
        .content {
            padding: 20px;
        }
        .content ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .content li {
            padding: 10px 0;
            border-bottom: 1px solid #eeeeee;
        }
        .content li:last-child {
            border-bottom: none;
        }
        .content li strong {
            display: inline-block;
            width: 180px;
            color: #2c3e50;
        }

        /* Footer */
        .footer {
            background-color: #ecf0f1;
            text-align: center;
            padding: 15px;
            font-size: 12px;
            color: #888888;
        }

        /* Responsive */
        @media only screen and (max-width: 620px) {
            .main { width: 90% !important; }
            .content li strong { display: block; width: 100%; margin-bottom: 5px; }
        }
    </style>
</head>
<body>
<table class="wrapper" cellpadding="0" cellspacing="0" role="presentation">
    <tr>
        <td align="center">
            <table class="main" cellpadding="0" cellspacing="0" role="presentation">
                <!-- Header -->
                <tr>
                    <td class="header">
                        <h2>Upis studenta sa kontakt forme sajta</h2>
                    </td>
                </tr>
                <tr>
                    <td class="content">
                        <ul>
                            <li><strong>Ime:</strong> {{ $student['ime'] }}</li>
                            <li><strong>Prezime:</strong> {{ $student['prezime'] }}</li>
                            <li><strong>Roditelj:</strong> {{ $student['roditelj'] }}</li>
                            <li><strong>JMBG:</strong> {{ $student['jmbg'] }}</li>
                            <li><strong>Datum rođenja:</strong> {{ $student['datumRodjenja'] }}</li>
                            <li><strong>Mesto rođenja:</strong> {{ $student['mestoRodjenja'] }}</li>
                            <li><strong>Stalno prebivalište:</strong> {{ $student['mestoStalnogRodjenja'] }}</li>
                            <li>
                                <strong>Adresa tokom studiranja:</strong>
                                {{ $student['mestoZaVremeStudiranja'] ?? '—' }}
                            </li>
                            <li><strong>Državljanstvo:</strong> {{ $student['drzavljanstvo'] }}</li>
                            <li><strong>Nacionalnost:</strong> {{ $student['nacionalnost'] }}</li>
                            <li><strong>Studijski program:</strong> {{ $student['st_program'] }}</li>
                            <li>
                                <strong>Završena srednja škola:</strong>
                                {{ $student['zavrsenaSrednjaSkola'] }}
                            </li>
                            <li><strong>Mobilni telefon:</strong> {{ $student['mobilniTelefon'] }}</li>
                            <li><strong>Email:</strong>
                                <a href="mailto:{{ $student['email'] }}" style="color: #2980b9; text-decoration: none;">
                                    {{ $student['email'] }}
                                </a>
                            </li>
                        </ul>
                    </td>
                </tr>
                <!-- Footer -->
                <tr>
                    <td class="footer">
                        &copy; {{ now()->year }} Visoka škola „Dositej“. Sva prava zadržana.
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
