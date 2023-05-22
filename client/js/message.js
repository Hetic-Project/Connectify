function updateMessages() {

    fetch('http://localhost:4000/message', {
        method: 'POST'
    })
    .then(response => response.json())
    .then(data => {
        // Le JSON a été récupéré et converti en un objet JavaScript
        console.log(data);
        // Effectuez les opérations souhaitées sur les données ici
    })
    .catch(error => {
        // En cas d'erreur lors de la requête
        console.error('Erreur lors de la récupération du JSON:', error);
    });
}

  setInterval(updateMessages, 5000);