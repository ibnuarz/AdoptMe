function sendMessage() {
    var userInput = document.getElementById("user-input").value;
    if (userInput.trim() === "") return;

    var chatBox = document.getElementById("chat-box");
    chatBox.innerHTML += '<div class="user-message chat-message"><strong>You:</strong> ' + userInput + '</div>';

    var chatHistory = sessionStorage.getItem('chatHistory');
    if (!chatHistory) {
        chatHistory = [];
    } else {
        chatHistory = JSON.parse(chatHistory);
    }
    chatHistory.push("You: " + userInput);
    sessionStorage.setItem('chatHistory', JSON.stringify(chatHistory));
    chatBox.innerHTML += '<div class="bot-message chat-message typing-indicator"><strong>AdoptMe:</strong><br>Mengetik...</div>';
    chatBox.scrollTop = chatBox.scrollHeight;

    fetch('http://127.0.0.1:5000/chat', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'question=' + encodeURIComponent(userInput)
    })
    .then(response => response.json())
    .then(data => {
        setTimeout(function() {
            var typingIndicator = document.querySelector('.typing-indicator');
            if (typingIndicator) {
                typingIndicator.remove();

                chatBox.innerHTML += '<div class="bot-message chat-message"><strong>AdoptMe:</strong><br>' + formatResponse(data.response) + '</div>';
                chatBox.scrollTop = chatBox.scrollHeight;

                var botResponse = "AdoptMe: " + formatResponse(data.response);
                chatHistory.push(botResponse);
                sessionStorage.setItem('chatHistory', JSON.stringify(chatHistory));
            }
        }, 1500);
    });

    document.getElementById("user-input").value = "";
    chatBox.scrollTop = chatBox.scrollHeight;
}


    function loadChatHistory() {
    var chatHistory = sessionStorage.getItem('chatHistory');
    if (chatHistory) {
        chatHistory = JSON.parse(chatHistory);
        var chatBox = document.getElementById("chat-box");
        chatBox.innerHTML = '';
        chatHistory.forEach(message => {
            var messageHTML = '';
            if (message.startsWith("You:")) {
                messageHTML = '<div class="user-message chat-message"><strong>You:</strong> ' + message.substring(5) + '</div>';
            } else {
                messageHTML = '<div class="bot-message chat-message"><strong>AdoptMe:</strong><br>' + message.substring(8) + '</div>';
            }
            chatBox.innerHTML += messageHTML;
        });
        chatBox.scrollTop = chatBox.scrollHeight;
    }
    }

    window.onload = function() {
        loadChatHistory();
    };

    function handleKeyPress(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            sendMessage();
        }
    }
    document.getElementById("user-input").addEventListener("keypress", handleKeyPress);
    function formatResponse(response) {
        response = response.replace(/\*/g, '');
        var sentences = response.split('\n').filter(sentence => sentence.trim() !== '');
        
        if (sentences.length === 1) {
            return sentences[0].trim();
        }

        var formattedResponse = sentences.map((sentence, index) => {
            if (index === 0) {
                return sentence.trim();
            } else {
                return '-\n' + sentence.trim();
            }
        }).join('<br>');

        return formattedResponse;
    }
    $('#chatModal').on('shown.bs.modal', function () {
    var modalBody = $(this).find('.modal-body');
    modalBody.scrollTop(modalBody.prop("scrollHeight"));
    });