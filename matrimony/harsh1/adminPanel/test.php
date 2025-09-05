<html>

<head>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
        $(function() {

            $('button').on('submit', function(e) {

                e.preventDefault();

                $.ajax({
                    type: 'post',
                    url: 'fetch.php',
                    data: $('form').serialize(),
                    success: function(reponse) {
                        alert(reponse);
                    }
                });

            });

        });
    </script>
</head>

<body>
    <div>
        <input name="time" value="00:00:00.00"><br>
        <input name="date" value="0000-00-00"><br>
        <input name="submit" type="submit" value="Submit">
    </div>
</body>

</html>