<!DOCTYPE html>
<html>
<head>
    <title>Teddy Nunyah Private Chat</title>
    <script>
        (function fetchMessages(){
            const request = new Request("tnpcmessages")
            let messages;
            window.fetch(request)
            .then((response) => {
                return response.text()
            })
            .then((text) => {
                document.getElementById("messages").innerHTML = text;
            })
            setTimeout(fetchMessages, 1000)
        })();
    </script>
</head>
<body>
    <div id="messages">

    </div>
</body>
</html>
