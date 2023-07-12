var bodyAnterior=""

function atualizarPagina(){
    const request = new XMLHttpRequest();

    request.open('GET', 'http://localhost/Pokedex/assets/php/search.php');

    request.onload = function() {
    if (request.status === 200) {
        const response = request.responseText;
        if (bodyAnterior!=response) {
            const parser = new DOMParser();
            const conteudo = parser.parseFromString(response, 'text/html');
            const areaSearch = conteudo.querySelector('.areaSearch');

            document.querySelector('.containerSearch *').outerHTML=areaSearch.outerHTML
            bodyAnterior=response
        }
    } else {
        console.error('Ocorreu um erro ao processar a solicitação.');
    }
    };

    request.send();
}

setInterval(function (){
    atualizarPagina();
},1000)

//Scroll
document.querySelector('a[href="#pokemonName"]').addEventListener('click', function(e) {
    e.preventDefault(); // evitar o comportamento padrão do link
    const target = document.querySelector(this.getAttribute('href'));
    const offsetTop = target.offsetTop - 50;
    window.scrollTo({
        top: offsetTop,
        behavior: "smooth" // rolagem suave
    });
});


document.querySelector('.after').addEventListener('click', function () {
    let data = { 
        paginationType: "after"
    };

    fetch('http://localhost/Pokedex/assets/config/dataSearch.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.text())
    .then(data => console.log(data))
    .catch(error => console.error(error));

});
