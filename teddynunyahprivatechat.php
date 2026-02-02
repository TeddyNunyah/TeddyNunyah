<!DOCTYPE html>
<html>

<head>
    <title>Teddy Nunyah Private Chat</title>
    <script>
        function fetchMessages() {
            window.fetch("tnpcmessages")
                .then((response) => {
                    return response.text()
                })
                .then((text) => {
                    if (messages.innerHTML !== text) {
                        messages.innerHTML = text;
                        if (messages.scrollHeight - window.innerHeight * 0.9 - messages.scrollTop < 250) {
                            messages.scrollTop = messages.scrollHeight
                        } 
                    }
                })
        };
        setInterval(fetchMessages, 500)

        function sendMessage() {
            let message = inputBox.value
            if (!message) {
                return
            }
            let userId = 1;
            inputBox.value = "";
            window.fetch("sendmessage", {
                    method: "POST",
                    body: message
                })
                .then(() => {
                    fetchMessages()
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
    <div id="messages" style="overflow-y: auto; height: 90vh; width:99vw; word-wrap: break-word">

    </div>
    <input id="inputBox" autofocus=true placeholder="Send a message...">
    <button id="send" onclick="sendMessage()">Send Message</button>
</body>

</html>
