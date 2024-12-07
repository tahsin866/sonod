<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Student Details</title>
    <style>
        @font-face {
            font-family: 'bangla';
            src: url({{ storage_path('fonts/bangla.ttf') }}) format('truetype');
        }
        body {
            font-family: 'bangla', sans-serif;
            font-size: 12px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        td {
            padding: 8px;
            border: 1px solid #000;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Student Details</h2>
    <table>
        <tr>
            <td width="30%">নাম (বাংলা)</td>
            <td>{{ $student->Name }}</td>
        </tr>
        <tr>
            <td>নাম (ইংরেজি)</td>
            <td>{{ $student->st_en_name }}</td>
        </tr>
        <!-- Add other fields -->
    </table>
</body>
</html>
