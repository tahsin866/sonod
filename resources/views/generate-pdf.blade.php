<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Student Details</title>
    <style>
        body {
            font-family: 'bangla', sans-serif;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table td {
            padding: 8px;
            border: 1px solid #ddd;
        }
        .label {
            background: #f3f4f6;
            font-weight: bold;
            width: 30%;
        }
    </style>
</head>
<body>
    <h2>Student Information</h2>
    <table class="table">
        <tr>
            <td class="label">নাম (আরবি)</td>
            <td>{{ $form->Name }}</td>
        </tr>
        <tr>
            <td class="label">নাম (ইংরেজি)</td>
            <td>{{ $form->st_en_name }}</td>
        </tr>
        <tr>
            <td class="label">পিতার নাম (বাংলা)</td>
            <td>{{ $form->Father }}</td>
        </tr>
        <!-- Add all other fields similarly -->
    </table>
</body>
</html>
