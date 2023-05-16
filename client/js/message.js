// Fonction pour update le form pour afficher les messages dans la BDD
function updateMessages() {
    // on fait un AJAX request pour récuperer les messages
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'http://localhost:4000/message/1/2/', true);
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            // La requête a marché update du form avec les nouveaux messages
            var messages = JSON.parse(xhr.responseText);
            var messageForm = document.getElementById('messageForm');
            var messageContainer = messageForm.getElementsByClassName('userMessage')[0];

            // Ajout de nouveaux messages au form
            messages.forEach(function (message) {
                var h3 = document.createElement('h3');
                h3.textContent = message.firstname;
                var p = document.createElement('p');
                p.textContent = message.message_content;
                messageContainer.appendChild(h3);
                messageContainer.appendChild(p);
            });
        }
    };
    xhr.send();
}

// Polling du message toutes les 5 secondes.
setInterval(updateMessages, 1000);
