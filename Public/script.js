// script.js

// Fonction pour afficher un message d'alerte
function showAlert(message) {
    alert(message);
}

// Fonction pour envoyer une requête AJAX
function sendAjaxRequest(url, method, data, successCallback, errorCallback) {
    var xhr = new XMLHttpRequest();
    xhr.open(method, url, true);
    xhr.setRequestHeader('Content-Type', 'application/json');

    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                var response = JSON.parse(xhr.responseText);
                if (successCallback) {
                    successCallback(response);
                }
            } else {
                if (errorCallback) {
                    errorCallback(xhr.status);
                }
            }
        }
    };

    xhr.onerror = function() {
        if (errorCallback) {
            errorCallback(xhr.status);
        }
    };

    xhr.send(JSON.stringify(data));
}

// Fonction pour charger les annonces
function loadAnnonces() {
    sendAjaxRequest('/annonces', 'GET', null, function(response) {
        // Traitement de la réponse
        // ...
        console.log(response);
    }, function(error) {
        // Gestion de l'erreur
        // ...
        console.error('Erreur lors du chargement des annonces : ' + error);
    });
}

// Code principal
document.addEventListener('DOMContentLoaded', function() {
    // Code exécuté lorsque le document HTML est complètement chargé
    // ...

    // Exemple d'appel de la fonction showAlert
    showAlert('Hello, world!');

    // Exemple d'appel de la fonction loadAnnonces
    loadAnnonces();
});
