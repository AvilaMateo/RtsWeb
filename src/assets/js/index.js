const pFooter = document.querySelector('footer p');

const year = new Date().getFullYear();

pFooter.innerHTML = `&copy; ${year} - Copyright RtsWeb`;

const botongrabar = document.getElementById("botongrabar"); // obtenemos las variables que estan en el html 
const botonpausar = document.getElementById("botonpausar"); // obtenemos las variables que estan en el html 
const texto = document.getElementById("texto"); // obtenemos las variables que estan en el html 

let reconocimiento = new webkitSpeechRecognition(); //creamos un objeto para el reconocimiento de voz
reconocimiento.lang = "es-ES";
reconocimiento.continuous = true;
reconocimiento.interimResults = false;

reconocimiento.onresult = (event) => {
    const results = event.results;
    const frase = results[results.length - 1][0].transcript; // aqui esta la frase 
    texto.value += frase;
}
reconocimiento.onend = (event) => {

}

botongrabar.addEventListener("click", () => {
    reconocimiento.start();
});

botonpausar.addEventListener("click", () => {
    reconocimiento.abort();
});