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
            if (!message || message.length > 500) {
                return
            }
            let userId = 1
            inputBox.value = ""
            updateCharCount()
            window.fetch("sendmessage", {
                    method: "POST",
                    body: message
                })
                .then(() => {
                    fetchMessages()
                })
        }

        let charCount = 0;

        function updateCharCount() {
            charCount = inputBox.value.length
            charCountFeedback.innerHTML = charCount + "/500"
            if (charCount >= 500) {
                charCountFeedback.style.color = "red"
            } else if (charCount >= 450) {
                charCountFeedback.style.color = "darkorange"
            } else {
                charCountFeedback.style.color = "black"
            }
        }
    </script>
</head>

<body>
    <div id="messages">

    </div>
    <button id="newMessages" onclick="messages.scroll({top: messages.scrollHeight, behavior: 'smooth'})">↓ New Messages</button>
    <input id="inputBox" autofocus=true placeholder="Send a message..." maxlength="500">
    <button id="send" onclick="sendMessage()">Send Message</button>
    <span id="charCountFeedback"></span>

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
        inputBox.addEventListener("input", updateCharCount)

        fetchMessages(true)
        updateCharCount()
    </script>
</body>

</html>
