<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Renta</title>
</head>

<body onload="onLoadSubmit()">
    <h1>LOADING...</h1>
    <section class="vh-100" style="opacity: 0;">

        <form action="/confirmBookingStep2" method="POST" name="confirm">
            @csrf
            <input type="text" name="token" value="{{ $token }}" />
            <input type="text" name="email" value="{{ $email }}" />
            <input type="text" name="location" value="{{ $location }}" />
            <input type="text" name="unit" value="{{ $unit }}" />
        </form>

    </section>

    <script language="javascript">
        function onLoadSubmit() {
            document.confirm.submit();
        }
    </script>
</body>

</html>
