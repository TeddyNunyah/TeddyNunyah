<!DOCTYPE html>
<html>

<head>
    <title>Teddy Nunyah Private Chat</title>
    <link rel="stylesheet" href="teddynunyahprivatechat.css" />
    <script>
        function fetchMessages(jumpToBottom = false) {
            window.fetch("tnpcmessages")
                .then((response) => {
                    return response.text()
                })
                .then((text) => {
                    if (messages.innerHTML == text) {
                        return
                    }
                    messages.innerHTML = text
                    if (messages.scrollHeight - messages.clientHeight * 1.25 - messages.scrollTop < 0 || jumpToBottom) {
                        messages.scrollTop = messages.scrollHeight
                    } else {
                        newMessages.style.display = "block"
                    }
                })
        }
        setInterval(fetchMessages, 500)

        function sendMessage() {
            let message = inputBox.value
            if (!message) {
                return
            }
            let userId = 1
            inputBox.value = ""
            window.fetch("sendmessage", {
                    method: "POST",
                    body: message
                })
                .then(() => {
                    fetchMessages()
                })
        }
    </script>
</head>

<body>
    <div id="messages">

    </div>
    <button id="newMessages" onclick="messages.scroll({top: messages.scrollHeight, behavior: 'smooth'})">↓ New Messages</button>
    <input id="inputBox" autofocus=true placeholder="Send a message...">
    <button id="send" onclick="sendMessage()">Send Message</button>

    <script>
        inputBox.addEventListener("keydown", (e) => {
            if (e.code === "Enter") {
                sendMessage()
            }
        })
        messages.addEventListener("scroll", () => {
            if (messages.scrollHeight - messages.clientHeight - messages.scrollTop <= 10) {
                newMessages.style.display = "none"
            }
        })

        fetchMessages(true)
    </script>
</body>

</html>
