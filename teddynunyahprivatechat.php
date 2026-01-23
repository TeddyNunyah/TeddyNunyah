<!DOCTYPE html>
<html>

<head>
    <title>Teddy Nunyah Private Chat</title>
    <script>
        function fetchMessages() {
            const request = new Request("tnpcmessages")
            window.fetch(request)
                .then((response) => {
                    return response.text()
                })
                .then((text) => {
                    document.getElementById("messages").innerHTML = text;
                })
        };
        setInterval(fetchMessages, 500)

        function sendMessage() {
            let message = inputBox.value
            if (!message) {
                return
            }
            let userId = 1;
            const request = new Request("sendmessage", {
                method: "POST",
                body: message,
            })

            window.fetch(request)
            .then(() => {
                fetchMessages()
                inputBox.value = "";
            })

        }

        window.addEventListener("load", function() {
            inputBox.addEventListener("keydown", function(e) {
                if (e.code === "Enter") {
                    sendMessage()
                }
            })
            fetchMessages()
        })
    </script>
</head>

<body>
    <div id="messages" style="overflow-y: auto; height: 75vh;">

    </div>
    <input id="inputBox" type="text" autofocus=true placeholder="Send a message...">
    <button id="send" onclick="sendMessage()">Send Message</button>
</body>

</html>
