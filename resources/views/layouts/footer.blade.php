<!DOCTYPE html>
<html>
<head>
    <title>Пример</title>
    <style>
        html, body {
            height: 100%;
        }
        .footer {
            height: 10vh; /* высота футера */
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
            background-color: #333;
            color: #fff;
        }
        .footer p, .footer ul {
            margin: 0;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 20px;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.5;
        }
        .footer a {
            color: #fff;
            text-decoration: none;
        }
        .footer p:first-child a {
            margin-right: 20px;
        }
        .footer p:last-child a {
            margin-left: 20px;
        }
    </style>
</head>
<body>
<footer class="footer">
    <p><a href="mailto:forum@gmail.com" class="text-white">forum@gmail.com</a></p>
    <p><a href="tel:+380660762002" class="text-white">+380660762002</a></p>
    <ul>
        <li style="margin-left: 23px;"><a href="https://www.volkswagen.de/de.html" class="text-white">Документація</a></li>
        <li style="margin-left: 15px;"><a href="https://uk.wikipedia.org/wiki/Main_Page" class="text-white">Форумні документи</a></li>
    </ul>
</footer>
</body>
</html>
